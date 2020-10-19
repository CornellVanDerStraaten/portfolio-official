// addProjectPage, on checkbox click, activate text input
// Declare checkbox and input

let checkboxLiveLink = document.getElementById('liveLinkCheckbox');
let textInputLiveLink = document.getElementById('liveLink');

let checkboxGithubLink = document.getElementById('githubLinkCheckbox');
let textInputGithubLink = document.getElementById('githubLink');

// Functions to change style
function liveLinkActivate() {
// Create new input field
let newInput = document.createElement('input');
    newInput.setAttribute('type', 'text');
    newInput.setAttribute('name', 'liveLink');
    newInput.setAttribute('id', 'liveLink');
    newInput.setAttribute('class', 'project-intro__text-input');
    // Checked -> Make and append newInput
    // Not checked -> invisible
    if(checkboxLiveLink.checked == true){
        document.getElementById('projectIntroLiveLabel').appendChild(newInput);
    } else {
        document.getElementById('liveLink').remove();
    }
}

function githubLinkActivate() {
let newInput = document.createElement('input');
    newInput.setAttribute('type', 'text');
    newInput.setAttribute('name', 'githubLink');
    newInput.setAttribute('id', 'githubLink');
    newInput.setAttribute('class', 'project-intro__text-input');


    if(checkboxGithubLink.checked == true){
        document.getElementById('projectIntroGithubLabel').appendChild(newInput);
    } else {
        document.getElementById('githubLink').remove();
    }
}

//  MODIFY PAGE

let githubLinkFromDB = document.getElementById('githubLinkFromDB').value;
let liveLinkFromDB   = document.getElementById('LiveLinkFromDB').value;

// Functions to change style
function liveLinkActivateModify() {
    // Create new input field
    let newInput = document.createElement('input');
        newInput.setAttribute('type', 'text');
        newInput.setAttribute('name', 'liveLink');
        newInput.setAttribute('id', 'liveLink');
        newInput.setAttribute('class', 'project-intro__text-input');
        newInput.setAttribute('value', liveLinkFromDB)
        // Checked -> Make and append newInput
        // Not checked -> invisible
        if(checkboxLiveLink.checked == true){
            document.getElementById('projectIntroLiveLabel').appendChild(newInput);
        } else {
            document.getElementById('liveLink').remove();
        }
    }
    
    function githubLinkActivateModify() {
    let newInput = document.createElement('input');
        newInput.setAttribute('type', 'text');
        newInput.setAttribute('name', 'githubLink');
        newInput.setAttribute('id', 'githubLink');
        newInput.setAttribute('class', 'project-intro__text-input');
        newInput.setAttribute('value', githubLinkFromDB);
    
    
        if(checkboxGithubLink.checked == true){
            document.getElementById('projectIntroGithubLabel').appendChild(newInput);
        } else {
            document.getElementById('githubLink').remove();
        }
    }
