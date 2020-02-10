using UnityEngine;

public interface ICommand {
    Transform transform { get; }
    void Move(Vector3 startPosition, Vector3 endPosition); 
}