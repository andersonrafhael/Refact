using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class CommandSwitchable {
    
    public void Execute(List<CommandInterface> commands) {
        if (commands is null) {
            Console.WriteLine("Lista Vazia");
        }

        foreach (CommandInterface command in commands) {
            //command.Execute();
        }
    }
}