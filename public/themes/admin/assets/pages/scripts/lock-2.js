var Lock = function () {

    return {
        //main function to initiate the module
        init: function () {

             $.backstretch([
		        "http://www.iprore.com/memberportal/assets/pages/media/bg/1.jpg",
    		    "http://www.iprore.com/memberportal/assets/pages/media/bg/2.jpg",
    		    "http://www.iprore.com/memberportal/assets/pages/media/bg/3.jpg",
    		    "http://www.iprore.com/memberportal/assets/pages/media/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		      });
        }

    };

}();

jQuery(document).ready(function() {
    Lock.init();
});