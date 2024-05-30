$(document).ready(function(){
  let limit = 5;
  let offset = 0;

  function showAffiliations(limit, offset) {
      $.ajax({
          url: "../controller/AjaxSlider.php",
          type: 'POST',
          datatype: "JSON",
          data: {
              limit: limit,
              offset: offset
          },
          success: function(data) {
              let affiliations = JSON.parse(data);
              let affiliationsSlider = $('#affiliations-slider');
              affiliationsSlider.empty();

              if (affiliations.length > 0) {
                  affiliations.forEach((affiliation) => {
                      affiliationsSlider.append(`
                          <div>
                              <div class="affiliations-details">
                                  <div><img src="../model/${affiliation.image}" alt="${affiliation.name}"></div>
                                  <div id="information">
                                  <div><span>${affiliation.name}</span></div>
                                  <div><span>${affiliation.phone_number}</span></div>
                                  <div><span>${affiliation.mail}</span></div>
                                  <div><span>${affiliation.description}</span></div>    
                                  </div>
                              </div>
                          </div>
                      `);
                  });

                  affiliationsSlider.slick({
                      infinite: true,
                      slidesToShow: 3,
                      slidesToScroll: 1,
                      autoplay: true,
                      autoplaySpeed: 1500,
                      dots: true,
                      arrows: false
                  });
              } else {
                  affiliationsSlider.append('<div style="color: red;">No affiliations created</div>');
              }
          },
          error: function() {
              $('#affiliations-slider').append('<div style="color: red;">Error loading affiliates</div>');
          }
      });
  }

  showAffiliations(limit, offset);

  $('#prev-btn').click(function() {
      if (offset > 0) {
          offset -= limit;
          showAffiliations(limit, offset);
      }
  });

  $('#next-btn').click(function() {
      offset += limit;
      showAffiliations(limit, offset);
  });
});
