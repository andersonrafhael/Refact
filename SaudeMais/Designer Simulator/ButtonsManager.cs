/*
 * Eudes Tenório "mad" Cavalcanti Filho
 * https://github.com/yepMad - https://www.behance.net/eudestenorio
 *
 * "one day you'll leave this world behind, so live a life you will remember"
 * thanks Avicii
 */

using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class ButtonsManager : MonoBehaviour
{
    public static ButtonsManager Instance = null;

    [Header("Canvas")] [SerializeField] private GameObject selancerCanvas;
    [SerializeField] private GameObject shopCanvas;
    [SerializeField] private GameObject energyCanvas;
    [SerializeField] private GameObject inventoryCanvas;
    [SerializeField] private EnergyCanvas scriptEnergyCanvas;
    [SerializeField] private GameObject resetCanvas;

    [Header("Slider")] [SerializeField] private Slider sliderCoffee;
    [SerializeField] private Slider slideReset;
    private Slider _sliderEnergy;

    [Header("Tutorial")] [SerializeField] private GameObject tutorialPrefab;

    [Header("Animator")] [SerializeField] private Animator listViewAnimator;

    private bool _bCoffeeStillMakingEffect;
    private bool _bCoffeeMaking;
    private bool _bOpenListView = false;

    private int _iTapValue = 1;

    private float _fHowLongDoesCoffee = 10f;
    private static readonly int OnClick = Animator.StringToHash("onClick");

    private void Awake()
    {
        if (Instance == null)
            Instance = this;
        //else if (Instance != this)
        Destroy(gameObject);
            
    }

    private void Start()
    {
        _sliderEnergy = GameManager.Instance.sliderEnergy;

        if (PlayerPrefs.GetInt("completedTutorial", 0) == 0)
        {
            Instantiate(tutorialPrefab, selancerCanvas.transform.parent.transform);
        }
    }

    #region Open and Close Canvas

    public void OpenCloseSelancerCanvas(bool state) {
        CommandInvoker OpenClose = new CommandInvoker();

        OpenClose.OpenCloseCanvas(selancerCanvas, state);
    }
    
    public void OpenSelancerCanvas() {
        CommandInvoker OpenClose = new CommandInvoker();
        OpenClose.OpenCloseCanvas(selancerCanvas, state);
    }

    public void CloseShopCanvas()
    {
        CommandInvoker OpenClose = new CommandInvoker();
        OpenClose.OpenCloseCanvas(shopCanvas, state);
    }

    public void OpenCloseEnergyCanvas()
    {
        CommandInvoker OpenClose = new CommandInvoker();
        OpenClose.OpenCloseCanvas(energyCanvas, state);
    }

    public void OpenCloseInventoryCanvas()
    {
        CommandInvoker OpenClose = new CommandInvoker();
        OpenClose.OpenCloseCanvas(inventoryCanvas, state);
    }

    public void OpenListView()
    {
        _bOpenListView = !_bOpenListView;
        listViewAnimator.SetBool(OnClick, _bOpenListView);
    }

    #endregion

    #region Shop Methods

    /// <summary>
    /// É ACESSADO ATRAVÉS DE BOTÕES NA UNITY, ELE CHAMA OUTROS MÉTODOS.
    /// </summary>
    public void BuyTheItem(bool buyWithGems, int itemValue, string itemId, GameObject itemReference,
        ShopItemUi clickedItem)
    {
        if (buyWithGems)
        {
            if (GameManager.Instance.AddOrDecreaseGems(-itemValue, false))
            {
                BuyItem(itemId);
                clickedItem.ItemBought();
            }
            else
            {
                Debug.Log("Você não tem gemas suficientes");
            }
        }
        else
        {
            if (GameManager.Instance.AddOrDecreaseCoins(-itemValue, false))
            {
                BuyItem(itemId);
                clickedItem.ItemBought();
            }
            else
            {
                Debug.Log("Você não tem moedas suficientes");
            }
        }
    }

    /// <summary>
    /// APENAS INFORMA AO GAME MANAGER QUE O USUÁRIO COMPROU UM ITEM EM ESPECÍFICO
    /// </summary>
    private static void BuyItem(string id)
    {
        GameManager.Instance.UserBoughtTheItem(id);
    }

    #endregion

    #region Coffee Methods

    public void MakeCoffee()
    {
        if (GameManager.Instance.IsCanBeMakeACoffee() && !_bCoffeeMaking)
        {
            StartCoroutine(_MakeCoffee());
        }
    }

    public void DrinkCoffee()
    {
        int coffeesPrepared = PlayerPrefs.GetInt("CoffeesPrepared");

        if (!_bCoffeeStillMakingEffect && coffeesPrepared > 0 && PlayerPrefs.GetInt("CoffeesDrunk") < 5)
        {
            StartCoroutine(_DrinkCoffee(_sliderEnergy.value));
        }
    }

    private IEnumerator _DrinkCoffee(float startValue)
    {
        _bCoffeeStillMakingEffect = true;
        GameManager.DrankCoffee();
        scriptEnergyCanvas.OnEnable();

        float timeRemaining = 20;

        while (timeRemaining > 0)
        {
            _iTapValue = 2;

            _sliderEnergy.value += Time.deltaTime;
            timeRemaining -= Time.deltaTime;

            PlayerPrefs.SetInt("EnergyValue", (int) _sliderEnergy.value);
            yield return null;
        }

        _sliderEnergy.value = (float) Math.Round(_sliderEnergy.value);

        _iTapValue = 1;

        _bCoffeeStillMakingEffect = false;
    }

    private IEnumerator _MakeCoffee()
    {
        sliderCoffee.gameObject.SetActive(true);

        float timeRemaining = _fHowLongDoesCoffee;

        while (timeRemaining > 0)
        {
            _bCoffeeMaking = true;
            timeRemaining -= Time.deltaTime;
            sliderCoffee.value = Mathf.Lerp(0, 100, Mathf.InverseLerp(_fHowLongDoesCoffee, 0, timeRemaining));
            yield return null;
        }

        sliderCoffee.value = 0;
        sliderCoffee.gameObject.SetActive(false);
        _bCoffeeMaking = false;

        GameManager.PreparedCoffee();
        try
        {
            scriptEnergyCanvas.OnEnable();
        }
        catch
        {
            /**/
        }
    }

    #endregion

    #region Inventary Methods

    public void DragObjectInRoom(ShopItem scriptableObject, Transform whoIsFather, GameObject ground)
    {
        var item = Instantiate(scriptableObject.itemReference, new Vector3(0, 0.5f, 0), Quaternion.identity);
        item.transform.parent = whoIsFather;

        item.transform.localRotation = scriptableObject.itemReference.transform.localRotation;

        CloseInventoryCanvas();

        item.AddComponent<MovementObjectRoom>().ground = ground;
        item.tag = scriptableObject.itemId;
    }

    #endregion

    #region Reset Methods

    public void ResetAll()
    {
        StopAllCoroutines();
        StartCoroutine(ResetPlayerPrefs());
    }

    private IEnumerator ResetPlayerPrefs()
    {
        PlayerPrefs.DeleteAll();
        resetCanvas.SetActive(true);

        yield return new WaitForSeconds(1f);

        AsyncOperation ao = SceneManager.LoadSceneAsync(0);

        while (!ao.isDone)
        {
            float progress = Mathf.Clamp01(ao.progress / 0.9f);
            slideReset.value = progress;
            yield return null;
        }
    }

    #endregion

    #region AdManager

    public void Sleep()
    {
        GoogleMobileAdsScript.Instance.UserChoseToWatchAd("Sleep");
    }

    #endregion

    #region Credits Methods

    public void FollowUsInstagram()
    {
        Application.OpenURL("https://www.instagram.com/designer.simulator/");
    }

#endregion

    public void Clicker()
    {
        GameManager.Instance.DecreaseActualJobTimeAndAddInSlider(_iTapValue);
    }
}
