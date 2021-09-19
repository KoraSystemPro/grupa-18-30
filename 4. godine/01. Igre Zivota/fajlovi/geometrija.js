var prsten;
function azurirajMaterijalPrstena(HTMLCanvas){
    let canv_text = new THREE.CanvasTexture(HTMLCanvas);
    const canv_mat = new THREE.MeshStandardMaterial({
        map: canv_text,
        displacementMap: canv_text,

    });
    prsten.material = canv_mat;
    prsten.material.needsUpdate = true;
}

function nacrtajScenu(){
    const scena = new THREE.Scene();
    const aspect_ratio = window.innerWidth / window.innerHeight;
    const kamera = new THREE.PerspectiveCamera(90, aspect_ratio, 0.1, 500);
    kamera.position.z = 40;

    // Prsten
    const geometry = new THREE.TorusGeometry(20, 5, 400, 400);
    const material = new THREE.MeshBasicMaterial( { color: 0xffff00 } );    
    prsten = new THREE.Mesh(geometry, material);

    // Svetla
    const svetlo1 = new THREE.PointLight(0xABD1F3, 20, 100 );
    svetlo1.position.set(60, 40, 20);
    const svetlo2 = new THREE.PointLight(0xC72F21, 20, 100 );
    svetlo2.position.set(-60, -40, 20);


    scena.add(prsten);
    scena.add(svetlo1);
    scena.add(svetlo2);
    
    const renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    document.body.appendChild( renderer.domElement );

    function animate() {
        requestAnimationFrame( animate );
        prsten.rotation.x += 0.01;
        prsten.rotation.y += 0.01;

        renderer.render( scena, kamera );
    }
    animate();
}