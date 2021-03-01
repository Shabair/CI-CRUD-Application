String.prototype.splice = function(idx, rem, str) {
    return this.slice(0, idx) + str + this.slice(idx + Math.abs(rem));
};

var IsEventlisterAdded = 1;
function autocomplete(inp, arr) {
  if(IsEventlisterAdded){
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
      console.log(arr);
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
        if(arr[i].toLowerCase().indexOf(val.toLowerCase()) !== -1){
            var patt = new RegExp(val,"igm");

              b = document.createElement("DIV");
              start_strong = "<strong>";
              end_strong = "</strong>";
              searchStr = arr[i];
              totalIndex = [];
            while (match = patt.exec(arr[i])) {
              /*create a DIV element for each matching element:*/
              /*make the matching letters bold:*/
              indexes = {'start':match.index,'end':patt.lastIndex};
              totalIndex.push(indexes);
            }
            incriment = 0;
            for(z = 0; z < totalIndex.length; z++){
              searchStr = searchStr.splice(totalIndex[z].start+incriment, 0, start_strong);
              incriment += 8;
              searchStr = searchStr.splice(totalIndex[z].end+incriment, 0, end_strong);
              incriment += 9;
            }


            b.innerHTML = searchStr;
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      console.log('call');
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
  }
}
//big search
   $(function(){
      var search = '';

      $(document).on('click',".fa.fa-search",function(){
        var val = $('#search').val();
        $('#big_search').remove();
        if(val !=""){
          $('<input>').attr({
              type: 'hidden',
              id: 'big_search',
              name: 'big_search',
              value:val
          }).appendTo('#big_form');
        }

        big_form_submit();
      });

      var url = window.location.href;
      
      var str = url;
      var patt = new RegExp("^"+base_url+"{1,}([a-zA-Z0-9_]+)");
      var res = patt.exec(str);
      var target = res[1];

      // $("#playlist").on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
      //   var id = $(this).val();
      //     $('#big_playlist').remove();
      //   if(id != 'recent'){
      //     // location.href = base_url+target+"?playlist="+id;
      //     $('<input>').attr({
      //         type: 'hidden',
      //         id: 'big_playlist',
      //         name: 'big_playlist',
      //         value:id
      //     }).appendTo('#big_form');
      //   }
      //   big_form_submit();
      // });



      function big_form_submit(){
        document.getElementById("big_form").submit();
      }







      $(document).on('keyup','#search',function(){
        search = $("#search").val();
        $.ajax({
            method: "POST",
            url: base_url+"AjaxRequests/search_suggest?search="+search,
            // url:'users.xml', // when use the xml in dataType
            dataType: "json", 

            success: function (data) { 
              // console.log(data.length);
              var search = [];
              $.each(data, function(index, element) {
                  search.push(element.title);
              });
              if(search.length){
                autocomplete(document.getElementById("search"), search);
                IsEventlisterAdded = 0;
              }else{
                $('#searchautocomplete-list').remove();
              }
            }
        });
      });



   });


function goBack() {
    window.history.back();
}