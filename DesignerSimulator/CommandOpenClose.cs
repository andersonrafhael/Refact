using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class CommandOpenClose : CommandInterface {

    private GameObject _canvasName;
    private bool _action; 

    public CommandOpenClose(GameObject canvasName, bool action) {
        this._canvasName = canvasName;
        this._action = action;
    }

    public void Execute(GameObject _canvasName, bool _state) {
        _canvasName.SetActive(_state);
    }
}