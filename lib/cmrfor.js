class Cmrfor extends HTMLElement {

    constructor() {
        super();
        console.log('constructor');
   
    }

    connectedCallback() {
        console.log('connectedCallback');
        this.style.display ="block";
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
