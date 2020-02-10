using System.Collections.Generic;
using UnityEngine;

public class CommandProcessor : MonoBehaviour{
    private List<Command> _commands = new List<Command>();
    private int _currentCommandIndex;

    public void ExecuteCommand(Command command) {
        _commands.Add(command);
        command.Execute();
        _currentCommandIndex = _commands.Count - 1;
    }

}