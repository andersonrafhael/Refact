public class ScaleCommand : Command {
    private readonly float _scaleFactor;

    public ScaleCommand(ICommand command, float scaleDirection) : base(command) {
        this._scaleFactor = scaleDirection == 1f ? 1.1f : 0.9f;
    }

    public override void Execute() {
        _command.transform.localScale *= _scaleFactor;
    }
}