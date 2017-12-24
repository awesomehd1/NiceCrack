
 
<!DOCTYPE html>
<html>
<head>
<title>Unovix | Maintenance</title>
<link rel="stylesheet" href="/assets/css/main.css">
<style>
form {
    border: 3px solid #f1f1f1;
}

.boxcontain {
    margin: 0 auto;
    text-align: left;
    width: 800px;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 10%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}


@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
.unovix-spin {
    top: 50%;
    left: 50%;
    width: 120px;
    height: 120px;
    -webkit-animation:spin 4s linear infinite;
    -moz-animation:spin 4s linear infinite;
    animation:spin 4s linear infinite;
}
@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
</style>
<link rel="shortcut icon" href="/assets/images/unovix-logo.png" type="image/png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<script src="/assets/3d/build/three.js?r=10"></script>
		<script src="/assets/3d/js/vr/WebVR.js?r=10"></script>	
	<style>
			body {
				font-family: Arial, Helvetica, sans-serif;
				background-color: #000;
				color: #000;
				margin: 0px;
				overflow: hidden;
			}
			#info {
				position: absolute;
				padding: 10px;
				width: 100%;
				text-align: center;
			}
			a {
				text-decoration: underline;
				cursor: pointer;
			}
		</style>	
		
</head>

	<body>








<div id="info">
<center><h2 style="color:white;">Unovix Maintenance Mode</h2></center>
<center><h5 style="color:white;">Estimated downtime:</h5> <p id="timer" style="color:white;"></p></center>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Dec 24, 2017 1:37:25").getTime();

var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    var distance = countDownDate - now;
    
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("timer").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML = "<p style='font-weight:bold;color:#f44336;'>Expired</p>";
    }
}, 1000);
</script>

<div class="jumbotron" style="width:50%;margin:0 auto;text-align:center;">
<form method="POST" action="">
  <div class="imgcontainer">
  <h4 class="title">Unovix currently undergoing maintenance.</h4>
<h5>Come back soon!</h5>
<img class="unovix-spin" src="/assets/images/unovix-logo.png" alt="" width="120" height="120">
  </div>

  <div class="container">
  <label class="form control">Username</label>
    <input type="text" placeholder="Enter Username" name="username" required>
  <label class="form control">Password</label>
    <input type="password" placeholder="Enter Password" name="password" required>
  <label class="form control">Code</label>
    <input type="password" placeholder="Enter Code" name="code" required>
    <button name="enter" type="submit">Enter</button>
</form>
</div>
</div>

		<script>
			var clock = new THREE.Clock();
			var container;
			var camera, scene, raycaster, renderer;
			var room;
			var isMouseDown = false;
			var INTERSECTED;
			var crosshair;
			init();
			animate();
			function init() {
				container = document.createElement( 'div' );
				document.body.appendChild( container );
				var info = document.createElement( 'div' );
				info.style.position = 'absolute';
				info.style.top = '10px';
				info.style.width = '100%';
				info.style.textAlign = 'center';
				info.innerHTML = '';
				container.appendChild( info );
				scene = new THREE.Scene();
				scene.background = new THREE.Color( 0x505050 );
				camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 0.1, 10 );
				scene.add( camera );
				crosshair = new THREE.Mesh(
					new THREE.RingGeometry( 0.02, 0.04, 32 ),
					new THREE.MeshBasicMaterial( {
						color: 0xffffff,
						opacity: 0.5,
						transparent: true
					} )
				);
				crosshair.position.z = - 2;
				camera.add( crosshair );
				room = new THREE.Mesh(
					new THREE.BoxGeometry( 6, 6, 6, 8, 8, 8 ),
					new THREE.MeshBasicMaterial( { color: 0x404040, wireframe: true } )
				);
				scene.add( room );
				scene.add( new THREE.HemisphereLight( 0x606060, 0x404040 ) );
				var light = new THREE.DirectionalLight( 0xffffff );
				light.position.set( 1, 1, 1 ).normalize();
				scene.add( light );
				var geometry = new THREE.BoxGeometry( 0.15, 0.15, 0.15 );
				for ( var i = 0; i < 200; i ++ ) {
					var object = new THREE.Mesh( geometry, new THREE.MeshLambertMaterial( { color: Math.random() * 0xffffff } ) );
					object.position.x = Math.random() * 4 - 2;
					object.position.y = Math.random() * 4 - 2;
					object.position.z = Math.random() * 4 - 2;
					object.rotation.x = Math.random() * 2 * Math.PI;
					object.rotation.y = Math.random() * 2 * Math.PI;
					object.rotation.z = Math.random() * 2 * Math.PI;
					object.scale.x = Math.random() + 0.5;
					object.scale.y = Math.random() + 0.5;
					object.scale.z = Math.random() + 0.5;
					object.userData.velocity = new THREE.Vector3();
					object.userData.velocity.x = Math.random() * 0.01 - 0.005;
					object.userData.velocity.y = Math.random() * 0.01 - 0.005;
					object.userData.velocity.z = Math.random() * 0.01 - 0.005;
					room.add( object );
				}
				raycaster = new THREE.Raycaster();
				renderer = new THREE.WebGLRenderer( { antialias: true } );
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				renderer.vr.enabled = true;
				container.appendChild( renderer.domElement );
				renderer.domElement.addEventListener( 'mousedown', onMouseDown, false );
				renderer.domElement.addEventListener( 'mouseup', onMouseUp, false );
				renderer.domElement.addEventListener( 'touchstart', onMouseDown, false );
				renderer.domElement.addEventListener( 'touchend', onMouseUp, false );
				window.addEventListener( 'resize', onWindowResize, false );
				//
				window.addEventListener( 'vrdisplaypointerrestricted', onPointerRestricted, false );
				window.addEventListener( 'vrdisplaypointerunrestricted', onPointerUnrestricted, false );
				
				document.body.appendChild( WEBVR.createButton( renderer ) );
				
			}
			function onMouseDown() {
				isMouseDown = true;
			}
			function onMouseUp() {
				isMouseDown = false;
			}
			function onPointerRestricted() {
				var pointerLockElement = renderer.domElement;
				if ( pointerLockElement && typeof(pointerLockElement.requestPointerLock) === 'function' ) {
					pointerLockElement.requestPointerLock();
				}
			}
			function onPointerUnrestricted() {
				var currentPointerLockElement = document.pointerLockElement;
				var expectedPointerLockElement = renderer.domElement;
				if ( currentPointerLockElement && currentPointerLockElement === expectedPointerLockElement && typeof(document.exitPointerLock) === 'function' ) {
					document.exitPointerLock();
				}
			}
			function onWindowResize() {
				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();
				renderer.setSize( window.innerWidth, window.innerHeight );
			}
			//
			function animate() {
				renderer.animate( render );
			}
			function render() {
				var delta = clock.getDelta() * 60;
				if ( isMouseDown === true ) {
					var cube = room.children[ 0 ];
					room.remove( cube );
					cube.position.set( 0, 0, - 0.75 );
					cube.position.applyQuaternion( camera.quaternion );
					cube.userData.velocity.x = ( Math.random() - 0.5 ) * 0.02 * delta;
					cube.userData.velocity.y = ( Math.random() - 0.5 ) * 0.02 * delta;
					cube.userData.velocity.z = ( Math.random() * 0.01 - 0.05 ) * delta;
					cube.userData.velocity.applyQuaternion( camera.quaternion );
					room.add( cube );
				}
				// find intersections
				raycaster.setFromCamera( { x: 0, y: 0 }, camera );
				var intersects = raycaster.intersectObjects( room.children );
				if ( intersects.length > 0 ) {
					if ( INTERSECTED != intersects[ 0 ].object ) {
						if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );
						INTERSECTED = intersects[ 0 ].object;
						INTERSECTED.currentHex = INTERSECTED.material.emissive.getHex();
						INTERSECTED.material.emissive.setHex( 0xff0000 );
					}
				} else {
					if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );
					INTERSECTED = undefined;
				}
				// Keep cubes inside room
				for ( var i = 0; i < room.children.length; i ++ ) {
					var cube = room.children[ i ];
					cube.userData.velocity.multiplyScalar( 1 - ( 0.001 * delta ) );
					cube.position.add( cube.userData.velocity );
					if ( cube.position.x < - 3 || cube.position.x > 3 ) {
						cube.position.x = THREE.Math.clamp( cube.position.x, - 3, 3 );
						cube.userData.velocity.x = - cube.userData.velocity.x;
					}
					if ( cube.position.y < - 3 || cube.position.y > 3 ) {
						cube.position.y = THREE.Math.clamp( cube.position.y, - 3, 3 );
						cube.userData.velocity.y = - cube.userData.velocity.y;
					}
					if ( cube.position.z < - 3 || cube.position.z > 3 ) {
						cube.position.z = THREE.Math.clamp( cube.position.z, - 3, 3 );
						cube.userData.velocity.z = - cube.userData.velocity.z;
					}
					cube.rotation.x += cube.userData.velocity.x * 2 * delta;
					cube.rotation.y += cube.userData.velocity.y * 2 * delta;
					cube.rotation.z += cube.userData.velocity.z * 2 * delta;
				}
				renderer.render( scene, camera );
			}
		</script>
<audio id="oof2" autoplay="true">
<source src="/assets/audio/oof-maintenance.mp3" id="oof2">
</audio>
<script>
var vid = document.getElementById("oof2");
vid.volume = 0.35;
</script>
