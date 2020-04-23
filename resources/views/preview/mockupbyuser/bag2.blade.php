@extends('layouts.app')

@section('content')
<style>
    canvas{
        width: 100%;
        height: 100%;
    }
</style>
{{-- <canvas id="myCanvas"></canvas> --}}
<script src="{{asset('js/THREEjs/three.js')}}"></script>
<script src="{{asset('js/THREEjs/OrbitControls.js')}}"></script>
{{-- <script src="{{asset('js/THREEjs/TrackBallsControls.js')}}"></script> --}}

<script src="{{asset('js/THREEjs/GLTFLoader.js')}}"></script>



<script>

    var renderer,
     scene,
     camera,
     controls,
    //  myCanvas = document.getElementById('myCanvas');

    //RENDERER
    renderer = new THREE.WebGLRenderer();
    renderer.setClearColor(0xf7f7f7);
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild( renderer.domElement);

    window.addEventListener('resize', function(){
        var width = window.innerWidth;
        var height = window.innerHeight;
        renderer.setSize(width,height);
        camera.aspect = width/height;
        camera.updateProjectionMatrix();
    })
    //CAMERA
    camera = new THREE.PerspectiveCamera(3, window.innerWidth / window.innerHeight, 1, 10000 );
    
    //SCENE
    scene = new THREE.Scene();
    
    controls = new THREE.OrbitControls( camera,renderer.domElement );

    //LIGHTS
    var light = new THREE.AmbientLight(0xffffff, 0.5);
    scene.add(light);

    var light2 = new THREE.PointLight(0xffffff, 0.5);
    scene.add(light2);
  
    var loader = new THREE.GLTFLoader();

    loader.load('/logomockupload/{{$mockup->token}}/chipspotatobag/chips.gltf', handle_load);

    var mesh;


    function handle_load(gltf) {

        console.log(gltf);
        mesh = gltf.scene;
        console.log(mesh.children[0]);
        mesh.children[0].material = new THREE.MeshLambertMaterial();
  scene.add( mesh );
        mesh.position.z = -10;
    }


    //RENDER LOOP
    camera.position.set( 0, -10, 100 );

    render();
    controls.update();


    var delta = 0;
    var prevTime = Date.now();

    function render() {

        delta += 0.1;

        if (mesh) {
        
            mesh.rotation.y += 0.005;
            // mesh.rotation.x += 0.001;

            //animation mesh
            // mesh.morphTargetInfluences[ 0 ] = Math.sin(delta) * 20.0;
        }

     renderer.render(scene, camera);

     requestAnimationFrame(render);

    }

    </script>

@endsection
