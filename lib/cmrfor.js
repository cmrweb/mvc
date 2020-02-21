class Cmrfor extends HTMLElement {

    constructor() {
        super();
        console.log('constructor');
   
    }

    connectedCallback() {
        console.log('connectedCallback');
     
    }

    disconnectedCallback() {
        console.log('disconnectedcallback');
    }

    attachedCallback() {

    }

    attributChangeCallback() {

    }
}
customElements.define("cmr-loop", Cmrfor);
