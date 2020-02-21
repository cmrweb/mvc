class Cmrfor extends HTMLElement {

    constructor() {
        super();
        console.log('constructor');
        this.style.display ="block";
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
