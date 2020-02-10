using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Bola : MonoBehaviour {

    public Vector2 Velocidade;

    void Start() {

        Rigidbody2D rigidbody = GetComponent<Rigidbody2D> ();
        rigidbody.AddForce (Velocidade);     
        
    }  
}
