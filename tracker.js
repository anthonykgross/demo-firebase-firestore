var db = firebase.firestore();
const settings = {timestampsInSnapshots: true};
db.settings(settings);

window.onload = function () {
    pushData("ONLOAD");
};


window.onbeforeunload = function () {
    pushData("UNLOAD");
};


function pushData(action) {
    db.collection("users").add({
        id: "crazymeal",
        action: action,
        url: "index.html",
        created_at: new Date().toLocaleDateString(),
    })
    .then(function(docRef) {
        console.log("Document written with ID: ", docRef.id);
    })
    .catch(function(error) {
        console.error("Error adding document: ", error);
    });

}