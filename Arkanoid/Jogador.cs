using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[RequireComponent(typeof(InputReader))]
[RequireComponent(typeof(CommandProcessor))]

public class Jogador : MonoBehaviour, ICommand {

    public float velocidade = 10.0f;
    public float HorizontalAxis;
    //public Rigidbody2D rigidbody;
    private InputReader _inputReader;
    private CommandProcessor _commandProcessor;

    private void Awake() {
        _inputReader = GetComponent<InputReader>();
        _commandProcessor = GetComponent<CommandProcessor>();
    }

    void Start() {

        //rigidbody = GetComponent<Rigidbody2D>();
    }

    void Update() {

        var direction = _inputReader.ReadInput();
        if(direction != Vector3.zero) {
            var moveCommand = new MoveCommand(this, direction);
            _commandProcessor.ExecuteCommand(moveCommand);
        }

        //HorizontalAxis = Input.GetAxis("Horizontal");
        //rigidbody.velocity = new Vector2(velocidade * HorizontalAxis, 0);
        
    }

    public void Move(Vector3 startPosition, Vector3 endPosition){
        throw new System.NotImplementedException();
    }
}
