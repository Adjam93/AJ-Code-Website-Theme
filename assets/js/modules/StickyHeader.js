class StickyHeader {

    constructor() {

        this.header = document.querySelector( ".main-header" )
        this.modelHeroArea = document.getElementById( "models-hero" )

        this.stickyOptions = {
            rootMargin:  "-200px 0px 0px 0px"
        }

        this.events()
        this.observeditems()

    }
  
    events() {
  
      this.stickyOnScroll = new IntersectionObserver( this.intersectionCallback.bind( this ), this.stickyOptions )

    }

    intersectionCallback( entries, stickyOnScroll ) {

        entries.forEach( entry => {

            if ( ! entry.isIntersecting ) {

                this.header.classList.add( "add-background" )
                
            }
            else{

                this.header.classList.remove( "add-background" )
            }

        })

     }

     observeditems() {  

        if( this.modelHeroArea ) {

            this.stickyOnScroll.observe( this.modelHeroArea )

        }
        
        
     }
  
}
  
export default StickyHeader