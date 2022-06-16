$(function(){
//    define variables
    var activeNote = 0;
    var editMode = false;
//    load notes on page load: Ajax call to loadnote.php
    $.ajax({
        url: "loadnotes.php",
        success: function(data){
            $('#notes').html(data);
            clickonNote();
            clickonDelete();
        },
        error: function(){
            $("#alertContent").text("There was an error with the Ajax call");
            $("#alert").fadeIn();
        }
    });
//    add new notes: Ajax call to createnote.php
    $('#addNote').click(function(){
        $.ajax({
            url: "createnotes.php",
            success: function(data){
                if(data == 'error'){
                    $("#alertContent").text("There was an issue inserting the new note into the database");
                    $("#alert").fadeIn();
                }else{
//                    Update activeNote
                    activeNote = data;
                    $("textarea").val("");
                    
//                    show hide elements
                    showHide(["#notePad", "#allNotes"], ["#notes", "#addNote", "#edit", "#done"]);
                    $("textarea").focus();
                }
            },
            error: function(){
                $("#alertContent").text("There was an error with the Ajax call");
                $("#alert").fadeIn();
            }
        });
    });
    
//    type notes: Ajax call to updatenote.php
    $("textarea").keyup(function(){
//        Ajax call to update the task of id activenote
        $.ajax({
            url: "updatenotes.php",
            type: "POST",
            //we need to send the current note w/ its id to the php file
            data: {note:$(this).val(), id:activeNote},
            success: function(data){
                if(data == 'error'){
                    $("#alertContent").text("There was an error with the Ajax call");
                    $("#alert").fadeIn();
                }
            },
            error: function(){
                $("#alertContent").text("There was an issue with updating the note in the database.");
                $("#alert").fadeIn();
            }
        });
    });
//    click on all notes
    $("#allNotes").click(function(){
        $.ajax({
            url: "loadnotes.php",
            success: function(data){
                $('#notes').html(data);
                showHide(["#notes", "#addNote", "#edit"], ["#notePad", "#allNotes", "#done"]);
                clickonNote();
                clickonDelete();
            },
            error: function(){
                $("#alertContent").text("There was an error with the Ajax call");
                $("#alert").fadeIn();
            }
        });
    });
//    click on done after editing: load notes again
    $("#done").click(function(){
        editMode = false;
        $(".noteHeader").removeClass("col-xs-7 col-sm-9");
        showHide(["#edit"], [this, ".delete"]);
    });
    
//    click on edit: go to edit mode and show delete buttons
    $("#edit").click(function(){
        //switch to edit mode
        editMode = true;
        //reduce width of noteHeader by adding a class
        $(".noteHeader").addClass("col-xs-7 col-sm-9");
//        show hide elements
        showHide(["#done", ".delete"],[this]);
        
    });
    
    //functions
        //click on a note
    function clickonNote(){              
        $(".noteHeader").click(function(){
            if(!editMode){
                //update activeNote variable to id of note
                activeNote = $(this).attr("id");

                //fill text area
                $("textarea").val($(this).find('.noteText').text());
                //show hide elements
                showHide(["#notePad", "#allNotes"], ["#notes", "#addNote", "#edit", "#done"]);
                $("textarea").focus();
            }
        });
    }
        //click on delete
    function clickonDelete(){
        $(".delete").click(function(){
            var deleteButton = $(this);
            $.ajax({
                url: "deletenotes.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {id:deleteButton.next().attr("id")},
                success: function(data){
                    if(data == 'error'){
                        $("#alertContent").text("There was an issue with deleting the note from the database.");
                        $("#alert").fadeIn();
                    }else{
                        deleteButton.parent().remove();
                    }
                },
                error: function(){
                    $("#alertContent").text("There was an issue with updating the note in the database.");
                    $("#alert").fadeIn();
                }
            });
        });
    }
        //show hide function
    function showHide(array1, array2){
        for(i=0; i<array1.length; i++){
            $(array1[i]).show();            
        }
        for(i=0; i<array2.length; i++){
            $(array2[i]).hide();            
        }
    };
});