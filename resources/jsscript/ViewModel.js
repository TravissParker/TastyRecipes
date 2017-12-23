$(document).ready(function () {
    console.log("---Document ready --- It is alive...---");

    var baseURL = 'http://localhost/TastyRecipes/tsrc/View/';
    var commentURL = baseURL + 'GetComments';
    var deleteURL = baseURL + 'DeleteComment';
    var usernameURL = baseURL + 'GetUsername';
    var postURL = baseURL + 'PostComment';


    function MessageBoard() {
        var self = this;
        self.signedUser = null;
        self.comments = ko.observableArray(); //This name is bad
        self.message = ko.observable(); //This is a 'comment' - it should be named newComment or something
        self.newestCom = -1;

        function updateNewestCom(id) {
            if (id > self.newestCom) {
                self.newestCom = id;
                //Anything else?
            }
        }

        $.getJSON(usernameURL, function(username) {
            self.signedUser = username;
        });

        self.getComments = function () {
            $.getJSON(commentURL, "currentPage=" + window.location.href + "&currentHigh=" + self.newestCom, function(com) {
                for (var i = 0; i < com.length; i++) {
                    //fixme: remove quotes from msg
                    console.log(com);
                    com[i].author = removeQoutes(com[i].author);
                    com[i].msg = removeQoutes(com[i].msg);
                    updateNewestCom(com[i].comID);

                    if (Boolean(self.signedUser)) {
                        if (com[i].author.valueOf().toLowerCase() ===
                            self.signedUser.valueOf().toLowerCase()) {
                            com[i].trueWriter = true;
                        }
                    }
                }//for
                //Question: maybe we need to append the comments - now we recreate the whole msg board?
                self.comments(com);
                //Long polling switch
                self.getComments();
            });//getJson
        };

        self.postComment = function () {
            console.log("Post comment");
            console.log(self.message);
            $.post(postURL, "author=" + self.signedUser + "&message=" + ko.toJS(self.message) + "&recipePage=" + window.location.href);
            self.message('');
            console.log("Post final");
        };

        self.deleteComment = function (com) {
            self.comments.remove(com);
            $.post(deleteURL, "comID=" + com.comID);
        };
        self.getComments(); //First fetching of comments
    }

    function removeQoutes(text) {
        return text.replace(/"/g,"");
    }

    ko.applyBindings(new MessageBoard());
});