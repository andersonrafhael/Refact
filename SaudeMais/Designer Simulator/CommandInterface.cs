using UnityEngine;
using System.Collections;

//This is a basic interface with a single required
//method.
public interface CommandInterface {
    void Execute(GameObject canvasName, bool action);
}
