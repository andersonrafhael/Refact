using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Bloco : MonoBehaviour {

    public new Rigidbody2D rigidbody;
    public BoxCollider2D collider;

    void Start() {

        rigidbody = GetComponent<Rigidbody2D>();
        collider = GetComponent<BoxCollider2D>();
    }

    void OnCollisionEnter2D(Collision2D collision) {
        rigidbody.constraints = new RigidbodyConstraints2D();
        collider.isTrigger = true;
    }
}
