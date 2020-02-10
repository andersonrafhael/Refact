using UnityEngine;

public class MoveCommand : Command {
    private Vector3 _direction;

    public MoveCommand(ICommand command, Vector3 direction) : base(command) {
        _direction = direction;
    }

    public override void Execute() {
        _command.transform.position += _direction * 0.18f;
    }
}