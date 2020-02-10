
public abstract class Command {
    protected ICommand _command;

    public Command(ICommand command) {
        _command = command;
    }

    public abstract void Execute();
}