if(window.docCookies === undefined || typeof(docCookies) === 'undefined' ) {
    console.warn('docCookie not loaded');
}

if(typeof(Alpine) === undefined) {
    console.warn('Alpine not loaded');
}

const WabiNotice = ($el) => {
    return {
        keyValue: true,
        keyName: false,
        hidden: false,
        time: (60*24*60*60),
        init() {
            this.keyValue = true;
            this.keyName = $el.dataset.key;
            this.getCookie()
        },

        checkHidden() {
          if(this.keyValue === false || this.keyValue === 'false') {
              console.log(this.keyValue)
              this.hidden = true;
          } else {
              this.hidden = false;
          }
        },

        handleHide() {
          this.hidden = true;
          docCookies.setItem(`${this.keyName}`, false, this.time)
        },

        handleShow() {
            this.hidden = false;
            docCookies.setItem(`${this.keyName}`, true, this.time)
        },

        getCookie() {
            if(!docCookies.hasItem(`${this.keyName}`)) {
                return false;
            }
            this.keyValue = docCookies.getItem(`${this.keyName}`);
            this.checkHidden();
        },
    }
}
