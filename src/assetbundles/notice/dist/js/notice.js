if(window.docCookies === undefined || typeof(docCookies) === 'undefined' ) {
    let script = document.createElement('script');
    document.body.appendChild(script);
    script.type = 'text/javascript';
    script.src = "//cdn.jsdelivr.net/npm/doc-cookies@1.1.0/cookies.min.js";
}

if(window.Alpine === undefined) {
    let script = document.createElement('script');
    document.body.appendChild(script);
    script.type = 'text/javascript';
    script.src = "//unpkg.com/alpinejs@3.x.x/dist/cdn.min.js";
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
