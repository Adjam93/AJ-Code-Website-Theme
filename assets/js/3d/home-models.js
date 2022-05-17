let camera, scene, renderer, ground, flamingo, stork, eagle, clouds;

const mixers = [];

const clock = new THREE.Clock();
        
const mouse = new THREE.Vector2();
const windowHalf = new THREE.Vector2( window.innerWidth / 2, window.innerHeight / 2 );

let mouseX = 0, mouseY = 0;
let windowHalfX = window.innerWidth / 2;
let windowHalfY = window.innerHeight / 2;

let mq = window.matchMedia( "(max-width: 992px)" );

init();
animate();

function init() {

    const container = document.querySelector(".models-wrapper");

    camera = new THREE.PerspectiveCamera( 30, window.innerWidth / window.innerHeight, 1, 5000 );
    camera.position.set( 0, 0, 250 );

    scene = new THREE.Scene();

    //Lights
    const hemiLight = new THREE.HemisphereLight( 0xffffff, 0xffffff, 0.6 );
            hemiLight.color.setHSL( 0.6, 1, 0.6 );
            hemiLight.groundColor.setHSL( 0.095, 1, 0.75 );
            hemiLight.position.set( 0, 50, 0 );
    scene.add( hemiLight );


    const dirLight = new THREE.DirectionalLight( 0xffffff, 1 );
            dirLight.position.set( 0, 1.75, 1 );
            dirLight.position.multiplyScalar( 30 );
    scene.add( dirLight );
    
    dirLight.castShadow = true;

    dirLight.shadow.mapSize.width = 1024;
    dirLight.shadow.mapSize.height = 1024;

    const d2 = 200;

    dirLight.shadow.camera.left = - d2;
    dirLight.shadow.camera.right = d2;
    dirLight.shadow.camera.top = d2;
    dirLight.shadow.camera.bottom = - d2;

    dirLight.shadow.camera.near = 0.5;
    dirLight.shadow.camera.far = 500; 

    const loadingManager = new THREE.LoadingManager( () => {
	
        const loadingScreen = document.getElementById( 'loading-screen' );
        loadingScreen.classList.add( 'fade-out' );
        
        //Remove loader from DOM via event listener
        loadingScreen.addEventListener( 'transitionend', onTransitionEnd );
        
    } );


    scene.add( camera );

    let geometry = new THREE.Geometry();

    let texture = new THREE.TextureLoader().load( 'wp-content/themes/aj-code/images/cloud10.png' );

    let fog = new THREE.Fog( 0x4584b4, - 100, 3000 );

    material = new THREE.ShaderMaterial( {

        uniforms: {

            "map": { type: "t", value: texture },
            "fogColor" : { type: "c", value: fog.color },
            "fogNear" : { type: "f", value: fog.near },
            "fogFar" : { type: "f", value: fog.far },

        },
        vertexShader: document.getElementById( 'vs' ).textContent,
        fragmentShader: document.getElementById( 'fs' ).textContent,
        transparent: true,

    } );

    let plane = new THREE.Mesh( new THREE.PlaneGeometry( 20, 20 ) );

    for ( let i = 0; i < 100; i++ ) {

        plane.position.x = Math.random() * 1000 - 500;
        plane.position.y = Math.random() * 40 - 15;
        plane.position.z = i;
        plane.rotation.z = Math.random() * Math.PI;

        plane.updateMatrix();
        geometry.merge( plane.geometry, plane.matrix );

    }

    clouds = new THREE.Mesh( geometry, material );
    clouds.position.z = - 225;
    camera.add( clouds );

    //Models    
    const loader = new THREE.GLTFLoader( loadingManager );
    loader.load( 'wp-content/themes/aj-code/assets/models/flamingo.glb', function ( gltf ) {

        flamingo = gltf.scene.children[ 0 ];

        let s = 0.35;
        flamingo.position.set(-20, 30, 0);

        if( mq.matches ){

            s = 0.2;
            flamingo.position.set(0, 30, 0);

        }

        flamingo.scale.set( s, s, s );
        flamingo.rotation.y = - 1;

        scene.add( flamingo );

        const mixer = new THREE.AnimationMixer( flamingo );
        mixer.clipAction( gltf.animations[ 0 ] ).setDuration( 1 ).play();
        mixers.push( mixer );

    } );


    //Models    
    loader.load( 'wp-content/themes/aj-code/assets/models/stork.glb', function ( gltf ) {

        stork = gltf.scene.children[ 0 ];

        gltf.scene.traverse( function ( child ) {

            if ( child.isMesh ) {

                child.castShadow = true;
                child.receiveShadow = true;

            }

        } );


        let s = 0.35;
        stork.position.set(80, 25, -100);
        
        if( mq.matches ){

            s = 0.2;
            stork.position.set(30, 25, -100);

        }

        stork.scale.set( s, s, s );

        scene.add( stork );

        const mixer2 = new THREE.AnimationMixer( stork );
        mixer2.clipAction( gltf.animations[ 0 ] ).setDuration( 1 ).play();
        mixers.push( mixer2 );

    } );
    

    loader.load( 'wp-content/themes/aj-code/assets/models/eagle.glb', function ( gltf ) {

        eagle = gltf.scene.children[ 0 ];

        gltf.scene.traverse( function ( child ) {

            if ( 'material' in child ) {

                child.material.side = THREE.DoubleSide;

            }

            if ( child.isMesh ) {

                child.castShadow = true;
                child.receiveShadow = true;

            }


        } );

        let s = 0.55;
        eagle.position.set(-80, 15, -100);

        if( mq.matches ) {

            s = 0.4;
            eagle.position.set(-20, 5, -100);

        }

        eagle.scale.set( s, s, s );

        scene.add( eagle );

        const mixer3 = new THREE.AnimationMixer( eagle );
        mixer3.clipAction( gltf.animations[ 0 ] ).setDuration( 1 ).play();
        mixers.push( mixer3 );

    } );

    renderer = new THREE.WebGLRenderer( { antialias: true,  alpha: true } );
    renderer.setPixelRatio( window.devicePixelRatio );
    renderer.setSize( window.innerWidth, window.innerHeight );
    renderer.shadowMap.enabled = true;
    
    container.appendChild( renderer.domElement );

    document.addEventListener("mousemove", onMouseMove, false);
    window.addEventListener( 'resize', onWindowResize, false );

}

function onMouseMove( event ) {

    mouseX = ( event.clientX - windowHalfX ) / 2;
    mouseY = ( event.clientY - windowHalfY ) / 2;

}

function onWindowResize() {

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize( window.innerWidth, window.innerHeight );

}

function animate() {

    requestAnimationFrame( animate );

    if( flamingo != undefined && stork != undefined && eagle != undefined ) {

        if( ! mq.matches ){

            camera.position.x += ( -mouseX - camera.position.x ) * 0.05;
            camera.position.y += ( +mouseY - camera.position.y ) * 0.05;
            camera.lookAt(scene.position);

        }

        clouds.rotation.y = Math.sin( Date.now() * 0.0006 ) * Math.PI * 0.01;

        let currentSeconds = Date.now();

        flamingo.rotation.x = Math.sin( currentSeconds * 0.0007 ) * 0.5;
        flamingo.rotation.y = Math.sin( currentSeconds * 0.0007 ) * 0.5;

        stork.rotation.x = Math.sin( currentSeconds * 0.0007 ) * 0.5;
        stork.rotation.y = Math.sin( currentSeconds * 0.0007 ) * 0.5;

        eagle.rotation.y = Math.sin( currentSeconds * 0.0007 ) * 0.5;

    }

    render();

}

function render() {

    const delta = clock.getDelta();

    for ( let i = 0; i < mixers.length; i ++ ) {

        mixers[ i ].update( delta );

    }

    renderer.render( scene, camera );

}

function onTransitionEnd( event ) {

    event.target.remove();

}