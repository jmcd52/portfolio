// JavaScript Document
//When the page loads
jQuery(document).ready(function($) {
    //Create the feed
    var userFeed = new Instafeed({
        get: 'user',
        userId: '9998711101',
        limit: 12,
        resolution: 'standard_resolution',
        accessToken: '9998711101.8381b94.1d3daf9493c642cfb7af6ec5c2026cc1',
        sortBy: 'most-recent',
        template: '<a class="col-lg-2 col-md-2" href="{{link}}" target="_blank" title="{{caption}}"><img src="{{image}}" alt="{{caption}}" class="img-fluid" /></a>'
    });
    userFeed.run();
});