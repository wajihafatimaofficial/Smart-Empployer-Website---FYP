
/*Display LEIBTON in Homepage using Canvas*/
var recorder; // globally accessible

var recognition;

const canvas = document.querySelector('#canvas');
// const temp_canvas_fuck = document.getElementById('temp_fuck');
const ctx = canvas.getContext('2d');
var leibton_control = false;

//Resizing
canvas.height = window.innerHeight - 6;
canvas.width = window.innerWidth - 6;

//Initializing Variables.
var gap = 60
var vGap = 30
var particles;
var collide_limit = 40;
var velocity = 20;
var angular_velocity = 30;
var working_factor = {
    space_typed: false,
    space_needed: false
}

var mouse = {
    timestamp: 0,
    dx: 0,
    dy: 0,
    prevX: 0,
    prevY: 0,
    x: 0,
    y: 0,
    clicked: false
}

//Functions required For Collision Tasks

//Function to find Distance between two points
function distance(point1x, point1y, point2x, point2y) {
    return Math.sqrt((point1x - point2x) * (point1x - point2x) + (point1y - point2y) * (point1y - point2y))
}


/////////////CANVAS LEIBTON ENDS HERE/////////////////
//////////////////////////////////////////////////////////////////
/////////////////// EMOTION RECOGNIZER///////////////
/////////////////////////////////////////////////////////////
const video = document.getElementById('webcam');
const instruction = document.getElementById('caminstruct');
const liveView = document.getElementById('liveView');
const enableWebcamButton = document.getElementById('webcamButton');
const instructionText = document.getElementById("camiText");
const webcam_canvas = document.getElementById('webcam_canvas');
const output = document.getElementById('output');
// const temp_canvas_fuck = document.getElementById('temp_fuck');
const cam_ctx = webcam_canvas.getContext('2d');
const width = 640
const height = 480
var model = undefined;
var model_emotion = undefined;
var control = false;

  
// Error fallback when webcam access is denied.
var errorCallback = function (error) {
    if (error.name == 'NotAllowedError') {
        instructionText.innerHTML = "Webcam Access Not Allowed";
    } else if (error.name == 'PermissionDismissedError') {
        instructionText.innerHTML = "Permission Denied. Please provide Webcam Access.";
    }

};

function resetEverything() {
    control = false;
    console.log("Stopping Everything.")
    const stream = video.srcObject;
    const tracks = stream.getTracks();

    tracks.forEach(function (track) {
        track.stop();
    });

    video.srcObject = null;
    instruction.style.display = "flex";
    document.getElementById("cam_chart_main").style.left = "-225px";
    // 		document.getElementById("cam_chart_main").style.left = "-253px";
}

// Function to handle enableWebcamButton click.
// Takes video feed and the call predictWebcam function.
function enableCam(event) {
    // getUsermedia parameters to force video but not audio.
    control = true;
    const constraints = {
        audio: true,
        video: {
            width: 400,
            height: 330
        },
    };

    // Activate the webcam stream.
    navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
            video.srcObject = stream;
            instruction.style.display = "none";
            document.getElementById("cam_chart_main").style.left = 0;
            video.addEventListener('loadeddata', predictWebcam);
            streamaccess = true;
          
           
        })
        .catch(errorCallback)
}

//The main functioning starts from here. Check if webcam is supported/acceesible or not.
// Then loads the models and then wait for webcam permission.
// Check if webcam access is supported.

function getUserMediaSupported() {
    return (navigator.mediaDevices &&
        navigator.mediaDevices.getUserMedia);
}
if (getUserMediaSupported()) {

    if (model && model_emotion) {
        enableWebcamButton.style.display = "inline-flex";
        instructionText.innerHTML = "Please provide Webcam Access."
    } else {
        blazeface.load().then(function (loadedModel) {
            model = loadedModel;
            if (model_emotion) {
                enableWebcamButton.style.display = "inline-flex";
                instructionText.innerHTML = "Please provide Webcam Access."
            }
        });

        tf.loadLayersModel('model/model.json', false).then(function (loadedModel) {
            model_emotion = loadedModel;
            var Content = "";
      
            // new speech recognition object
                      var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
                      var recognition = new SpeechRecognition();
      
                
        recognition.continuous = true;
                  recognition.onresult = function(event) {
                  var current = event.resultIndex;
       
                   
                          var transcript = event.results[current][0].transcript;
                          var confidence = event.results[0][0].confidence;
      
                   Content += transcript;
      
                          output.innerHTML =  Content ;
                          output.classList.remove("hide");
                
        };
      recognition.start();
            if (model) {
                enableWebcamButton.classList.remove("removed");
                instructionText.innerHTML = "Please provide Webcam Access."
            }
        });
    }
    enableWebcamButton.addEventListener('click', enableCam);
} else {
    console.warn('getUserMedia() is not supported by your browser');
    instructionText.innerHTML = "getUserMedia() is not supported by your browser"
}


function predictWebcam() {
    cam_ctx.drawImage(video, 0, 0, width, height);
    const frame = cam_ctx.getImageData(0, 0, width, height);
    // Now let's start classifying a frame in the stream.
    model.estimateFaces(frame).then(function (predictions) {
        if (predictions.length === 1) {
            landmark = predictions[0]['landmarks'];
            nosex = landmark[2][0];
            nosey = landmark[2][1];
            right = landmark[4][0];
            left = landmark[5][0];
            length = (left - right) / 2 + 5;
            //Cropping the image.
            const frame2 = cam_ctx.getImageData(nosex - length, nosey - length, 2 * length, 2 * length);
            //Image is converted to tensor, resized, toBlackandWhite, then additional dimesion are added to match with [1, 48, 48, 1].
            var image_tensor = tf.browser.fromPixels(frame2).resizeBilinear([48, 48]).mean(2).toFloat().expandDims(0).expandDims(-1)
            //PIxels converted to image to check if the image is correct or not.
            /*tf.browser.toPixels(image_tensor.squeeze(0).squeeze(-1).div(tf.scalar(255)).clipByValue(0, 1)
    .mul(tf.scalar(255)) // floats automatically are multiplied by toPixels
    .cast('int32'), temp_canvas_fuck)   //temp_canvas_fuck    -------->   img element.
*/
            //Predicting from image.
            const result = model_emotion.predict(image_tensor);
            const predictedValue = result.arraySync();
        
            document.getElementById("angry").style.width = 100 * predictedValue['0'][0] + "%";
            document.getElementById("disgust").style.width = 100 * predictedValue['0'][1] + "%";
            document.getElementById("fear").style.width = 100 * predictedValue['0'][2] + "%";
            document.getElementById("happy").style.width = 100 * predictedValue['0'][3] + "%";
            document.getElementById("sad").style.width = 100 * predictedValue['0'][4] + "%";
            document.getElementById("surprise").style.width = 100 * predictedValue['0'][5] + "%";
            document.getElementById("neutral").style.width = 100 * predictedValue['0'][6] + "%";
        
        
        }
        // Call this function again to keep predicting when the browser is ready.
        if (control)
            window.requestAnimationFrame(predictWebcam);
    });
}

