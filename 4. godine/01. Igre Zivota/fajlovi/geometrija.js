function nacrtajScenu(){
    const scena = new THREE.Scene();
    const aspect_ratio = window.innerWidth / window.innerHeight;
    const kamera = new THREE.PerspectiveCamera(90, aspect_ratio, 0.1, 500);
    kamera.position.z = 5;

    const geometry = new THREE.BoxGeometry();
    const material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
    const kocka = new THREE.Mesh(geometry, material);

    scena.add(kocka);
    
    const renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    document.body.appendChild( renderer.domElement );

    function animate() {
        requestAnimationFrame( animate );
        renderer.render( scena, kamera );
    }
    animate();
}