var canvas, ctx, fps = 30, sine, toTop=true;

var Sine = function(x,y,width,height) {
	this.x = x;
	this.y = y;
	this.width = width;
	this.height = height;
	this.mass=10;
	this.leftOffset=0;
	this.midPoint={x:this.width/2,y:this.height/2};
};

Sine.prototype.draw=function() {
	for (var i=0; i<this.width; i++) {
		ctx.fillRect(i,Math.sin((i+this.leftOffset)/220)*7*this.mass+this.y,8,4);
		
		ctx.fillStyle="rgba(200,200,200,"+((Math.cos(i/220)*7*-this.mass+this.y)%100)*0.001+")";
		
		ctx.fillRect(i,Math.cos(i/220)*7*-this.mass+this.y,1,5);
		ctx.fill();
	}
};

window.onload=init;
function init() {
	canvas = document.getElementById('canvas'), ctx;
	if (!canvas.getContext) return;
	ctx = canvas.getContext('2d');
	
	sine = new Sine(50,140,1920,480);
	
	setInterval(reset,2000);
	setInterval(update,1000/fps);
	setInterval(draw,1000/fps);
}

function reset() {

}

function update() {
	
	
	if (toTop==true&&sine.mass<20) {
		sine.mass+=0.2;
		toTop=true;
	} else {
		toTop=false;
		sine.mass-=0.2;
		if (sine.mass<=-20) {
			toTop=true;
		}
	}
	
	sine.leftOffset+=10;
}

function draw() {
	ctx.fillStyle="rgba(10,10,10,.2)";
	ctx.fillRect(0,0,canvas.width,canvas.height);
	
	ctx.fillStyle="rgba(200,200,200,.5)";
	sine.draw();
}