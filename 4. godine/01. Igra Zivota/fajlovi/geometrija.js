var prsten;
function azurirajMaterijalPrstena(HTMLCanvas){
    let canv_slika = new THREE.CanvasTexture(HTMLCanvas);
    const canv_mat = new THREE.MeshStandardMaterial({
        map: canv_slika,
        displacementMap: canv_slika,
        displacementScale: 0.8,

    });
    prsten.material = canv_mat;
    prsten.material.needsUpdate = true;
}

function generisiSkyBox(brZvezda, sirina, visina){
    let skyCanv = document.createElement("canvas");
    skyCanv.width = sirina;
    skyCanv.height = visina;
    let ctx = skyCanv.getContext("2d");

    // document.body.appendChild(skyCanv);
    
    ctx.fillStyle = "black";
    ctx.fillRect(0, 0, sirina, visina);

    for(let i = 0; i < brZvezda; i++){
        let precnik = Math.random() * 2;
        let x = Math.floor(Math.random() * sirina);
        let y = Math.floor(Math.random() * visina);
        
        ctx.beginPath();
        ctx.arc(x, y, precnik, 0, 2*Math.PI);
        ctx.fillStyle = "white";
        ctx.fill();
    }

    let tekstura = new THREE.CanvasTexture(skyCanv);
    return tekstura;
}

function nacrtajScenu(){
    const scena = new THREE.Scene();
    const aspect_ratio = window.innerWidth / window.innerHeight;
    const kamera = new THREE.PerspectiveCamera(100, aspect_ratio, 0.1, 500);
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

    // Napravi SkyBox
    let skyBox = new THREE.BoxGeometry(120, 120, 120);
    let skyBoxMaterijal = new THREE.MeshBasicMaterial({
        map: generisiSkyBox(600, 2000, 2000),
        side: THREE.BackSide
    });
    let sky = new THREE.Mesh(skyBox, skyBoxMaterijal);

    const grupa = new THREE.Group();
    grupa.add(prsten);
    grupa.add(sky);

    scena.add(grupa);
    scena.add(svetlo1);
    scena.add(svetlo2);
    
    const renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    document.body.appendChild( renderer.domElement );

    
    function animate() {
        grupa.rotation.x += 0.005;
        grupa.rotation.y += 0.005;
        
        requestAnimationFrame( animate );
        renderer.render( scena, kamera );
    }
    animate();
}