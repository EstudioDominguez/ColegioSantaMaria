$(document).ready(function() {

  $('.example-twitter-oss .typeahead').typeahead({
    name: 'twitter-oss',
    prefetch: 'assets/data/repos.json',
    template: [
      '<p class="repo-language">{{language}}</p>',
      '<p class="repo-name">{{name}}</p>',
      '<p class="repo-description">{{description}}</p>'
    ].join(''),
    engine: Hogan
  });



  
});
