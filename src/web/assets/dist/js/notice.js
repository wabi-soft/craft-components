const WabiNotice = ($el) => {
  return {
    keyValue: true,
    keyName: false,
    hidden: false,
    time: (60*24*60*7),
    init() {
      this.keyValue = true;
      this.keyName = $el.dataset.key;
      this.getCookie()
      this.$nextTick(() => {
        $el.classList.add('notice--loaded')
        window.dispatchEvent(new CustomEvent('wabi:notice-loaded', { detail: { el: $el } }))
      })
    },

    checkHidden() {
      if(this.keyValue === false || this.keyValue === 'false') {
        this.hidden = true;
      } else {
        this.hidden = false;
      }
    },

    handleHide() {
      this.hidden = true;
      $el.classList.remove('notice--loaded')
      window.dispatchEvent(new CustomEvent('wabi:notice-hidden', { detail: { el: $el } }))
      docCookies.setItem(`${this.keyName}`, false, this.time, '/')
    },

    handleShow() {
      this.hidden = false;
      docCookies.setItem(`${this.keyName}`, true, this.time, '/')
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
