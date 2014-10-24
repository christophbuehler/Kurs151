$(function() {
    $('#newDiagram').on('click', function() {
        $.post('designer/create_diagram', $('#newDiagramForm').serialize(),
            function(data) {
                data = JSON.parse(data);
                if (data.code == 1) {
                    createDiagramError(data.msg);
                    return;
                }
                createDiagramSuccess(data);
            }
        );
    });

    // check if a diagram was already selected
    if (localStorage['diagramId']) {

        // load diagram
        loadDiagram(localStorage['diagramId']);
    } else {
        // show open dialogue
        $('#openDialogueBox').css({'display' : 'block'})

        // get diagrams
        getDiagrams(function(data) {
            var diagrams = data.diagrams, showOutput = '';
            diagrams.map(function(el) {
                showOutput += '<article data-id="' + el.id + '">' + el.name + '</article>';
            });
            $('#recentClassDiagrams').html(showOutput);
        })
    }

    // clicked on a recent diagram
    $('body').on('click', '#recentClassDiagrams article', function() {
        loadDiagram($(this).attr('data-id'), function(data) {
            var diagram = data.diagram;
            console.log(data);
            $('#openDialogueBox').css({'display' : 'none'});
            $('#pageContainer').html(diagram.html);
        });
    });
});

function createDiagramError(msg) {
    $('#createDiagramSuccess').html("");
    $('#createDiagramError').css({'opacity':'0'});
    setTimeout(function() {
        $('#createDiagramError').html(msg);
        $('#createDiagramError').css({'opacity':'1'});
    }, 200);
}

function createDiagramSuccess(data) {
    $('#createDiagramError').html("");
    $('#createDiagramSuccess').css({'opacity':'0'});
    setTimeout(function() {
        $('#createDiagramSuccess').html(data.msg);
        $('#createDiagramSuccess').css({'opacity':'1'});

        loadDiagram(data.id, function(data) {
            var diagram = data.diagram;

            $('#openDialogueBox').css({'display' : 'none'});
            $('#pageContainer').html(diagram.html);

            designer.currentDocument = new ClassDiagram(data.diagram);
        });
    }, 200);
}

function getDiagrams(successFunction) {
    $.post('designer/get_diagrams', null,
        function(data) {
            data = JSON.parse(data);
            successFunction(data);
        }
    );
}

function loadDiagram(diagramId, successFunction) {
    $.post('designer/get_diagram', { diagramId : diagramId },
        function(data) {
            data = JSON.parse(data);
            designer.currentDocument = new ClassDiagram(data.diagram);
            successFunction(data);
        }
    );
}