$(document).ready(function () {
    const baseURL = 'http://localhost/TastyRecipes/tsrc/View/';
    const commentURL = baseURL + 'GetComments';
    const deleteURL = baseURL + 'DeleteComment';
    const usernameURL = baseURL + 'GetUsername';
    const postURL = baseURL + 'PostComment';

    function MessageBoard() {
        const self = this;
        self.signedUser = null;
        self.comments = ko.observableArray();
        self.post = ko.observable();
        self.newestCom = -1;

        $.getJSON(usernameURL, function(username) {
            self.signedUser = username;
        });

        self.getComments = function () {
            $.getJSON(commentURL, "currentPage=" + window.location.href + "&currentHigh=" + self.newestCom, function(com) {
                for (let i = 0; i < com.length; i++) {
                    com[i].author = removeQoutes(com[i].author);
                    com[i].msg = removeQoutes(com[i].msg);

                    if (com[i].comID > self.newestCom) {
                        self.newestCom = com[i].comID;
                    }
                    if (Boolean(self.signedUser)) {
                        if (com[i].author.valueOf().toLowerCase() ===
                            self.signedUser.valueOf().toLowerCase()) {
                                com[i].trueWriter = true;
                        }
                    }
                    self.comments.push(com[i]);
                }
                self.getComments()  //Long polling switch
            });
        };

        self.postComment = function () {
            $.post(postURL, "author=" + self.signedUser + "&post=" + ko.toJS(self.post) + "&currentPage=" + window.location.href);
            self.post('');
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