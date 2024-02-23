import './bootstrap';
function async likePost (post_id){

const response :Respone = await fetch(input: 'posts/{post:slug}/like', init: {
    method: "POST", // *GET, POST, PUT, DELETE, etc.
    mode: "cors", // no-cors, *cors, same-origin
    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
    credentials: "same-origin", // include, *same-origin, omit
    headers: {
      "Content-Type": "application/json",
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
    redirect: "follow", // manual, *follow, error
    referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: JSON.stringify( value: {
        'post_id': post_id
    }), // body data type must match "Content-Type" header
  });

    result = await respone.JSON();
    if(result.action == 'liked'){
        $("like-btn-" + post_id).addClass('reaction-liked');
    }else{
        $("like-btn-" + post_id).removeClass('reaction-liked');
    }
 // parses JSON response into native JavaScript objects
return null;
}