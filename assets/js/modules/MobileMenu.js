class MobileMenu {

  constructor() {

    this.menuIcon = document.querySelector(".menu-icon")
    this.mobileMenu = document.querySelector(".mobile-menu")

    this.events()

  }

  events() {

    this.menuIcon.addEventListener( "click", () => this.toggleTheMenu() )
  
  }

  toggleTheMenu() {
    
    this.menuIcon.classList.toggle( "open" )
    this.mobileMenu.classList.toggle( "open" )

  }

}

export default MobileMenu