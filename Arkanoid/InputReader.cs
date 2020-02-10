using System;
using UnityEngine;

public class InputReader : MonoBehaviour{
    public Vector3 ReadInput() {
        float x = 0;
        if(Input.GetKey(KeyCode.LeftArrow))
            x = -1;
        else if (Input.GetKey(KeyCode.RightArrow))
            x = 1;


        if(x != 0) {
            Vector3 direction = new Vector3(x, 0, 0);
            return direction;
        }
        return Vector3.zero;
    }
}