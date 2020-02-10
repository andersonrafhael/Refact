using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;
public class CommandInvoker {

   /*
   private List<CommandInterface> commandsList = new List<CommandInterface>();
    private int currentCommandIndex;

    public void addCommand(CommandInterface command) {
        commandsList.Add(command);
        command.Execute();
        currentCommandIndex = command.Count - 1;
    }

    public void executeCommand() {
        command[currentCommandIndex].Execute();
        currentCommandIndex++;
    }
    */
    
    public void OpenCloseCanvas(GameObject canvasName, bool action) {
        List<CommandInterface> commands = new List<CommandInterface>();

        commands.Add(new CommandOpenClose(canvasName, action));

        CommandSwitchable executeCommand = new CommandSwitchable();

        executeCommand.Execute(commands); 
    }
}