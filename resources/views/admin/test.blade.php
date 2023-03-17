<style>
  body {
  padding: 0;
  margin: 0;
  background: #e2e5ee;
  font-family: "Segoe UI";
}

/*--- navigation bar ---*/

.navbar {
  background:#4e4764;
}

.nav-link,
.navbar-brand {
  color: #fff;
  cursor: pointer;
}

.nav-link {
  margin-right: 1em !important;
}

.nav-link:hover {
  color: #000;
}

.navbar-collapse {
  justify-content: flex-end;
}

img {width:100%;}


</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

  <script src="js/load.min.js"></script>
  <script>
    (function() {
      // Please read js/src/trackui.js for the API and code documentation.
      TrackUI.record({
        debug: true,
        // Example: track all clicks and poll mouse movements at 50 ms
        //regularEvents: "click",
        //pollingEvents: "mousemove",
        //pollingMs: 50,
        // Example: pure event polling at 500 ms
        //regularEvents: "",
        //pollingEvents: "*",
        //pollingMs: 500,
        postServer: "save.php"
      });
    })();
  </script>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br></br>
      <h2>News Feed</h2>
      <!--             <p>Find all the </p> -->
    </div>
  </div>
  <div class="row" id="feed">
    <div id="posts">

      <div class="row mb-2" id="templates">
        <div class="col-md-12" style="display: none;" id='post-template'>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <img id='post-image'>
                </div>
                <div class="col-md-9">
                  <div class="card-body">
                    <div class="news-content">
                      <a id='post-headline' href="#">
                        <h2></h2>
                      </a>
                      <p id='post-caption'></p>

                    </div>
                    <div class="alert alert-danger" role="alert" style='display:none' id='cred-label'>
                      <div class="row">
                        <div class="col-1 alert-icon-col">
                          <span class="fa fa-exclamation-triangle fa-fw"></span>
                        </div>
                        <div class="col">
                          <strong>Warning</strong> This post is disputed by a verification algorithm.
                        </div>
                      </div>
                    </div>
                    <div class="news-footer" style='display:none'>
                      <div class="news-author">
                        <ul class="list-inline list-unstyled">
                          <li class="list-inline-item text-secondary">
                            <i class="fa fa-user"></i>
                            Prashant Singh
                          </li>
                          <li class="list-inline-item text-secondary">
                            <i class="fa fa-eye"></i>
                            110 Views
                          </li>
                          <li class="list-inline-item text-secondary">
                            <i class="fa fa-calendar"></i>
                            26 June 2018
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 	    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <img src="http://eskimo.egemenerd.com/wp-content/uploads/2018/05/blog17.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
  </div>
</div>
<script>
  var img_arr = ['https://i.ibb.co/wRBnpN4/space-force.png"',
    'https://i.ibb.co/6v497qp/bashar.jpg"',
    'https://i.ibb.co/qWbL9tc/immigrant.png"',
    'https://i.ibb.co/v3PWffp/pot.png"',
    'https://i.ibb.co/xmhJF6r/electric-car.png"',
    'https://i.ibb.co/2nLb3vp/deerfield.png"',
    'https://i.ibb.co/Tw49sXH/nobel-prize.png"',
    'https://i.ibb.co/2y3tJKq/global-warming.png"',
    'https://i.ibb.co/qJQFSKw/ice-caps.png"',
    'https://i.ibb.co/0tCjk4F/school-shooting.jpg"',
    'https://i.ibb.co/cJkh7vx/corona-virus-africa.png"',
    'https://i.ibb.co/5xp4yyc/corona-lab.png"',
    'https://i.ibb.co/7Yzhcsg/cheifs.png"',
    'https://i.ibb.co/3hHN0PJ/biden.png"',
    'https://i.ibb.co/gJRdhB9/medical-debt.png"',
    'https://i.ibb.co/rc8ZDyT/court-weed.png"',
    'https://i.ibb.co/jDDctzC/vermont.png"',
    'https://i.ibb.co/KDvCcPQ/cocaine-nasal.png"',
    'https://i.ibb.co/VmhGRhL/clorox-corona.png"',
    'https://i.ibb.co/w65HYyn/putin-state-tv.png"',
    'https://i.ibb.co/P9VjZTd/trump-nobel.jpg"',,
    'https://i.ibb.co/7yM4Mj3/homeland-sec.png"',
    'https://i.ibb.co/68H6vP9/children-scary.jpg"'];

var headline_arr = ["Did Trump Tap Giorgio A. Tsoukalos for Secretary of the Space Force?",
    "Former Rep. Dennis Kucinich again meets with Syrian President Bashar al-Assad",
    "Report: Obama Administration Handed Child Migrants Over to Human Traffickers",
    "The U.S. Government’s Department of Health Finally Admits That Marijuana Kills Cancer",
    "Zimbabwean man invents an electric car that requires no charging",
    "Officials in the village of Deerfield, Illinois passed an ordinance banning assault weapons",
    "UPDATE: Trump Has The Votes-Wins Nobel Peace Prize",
    "Climate Alarmists Caught Faking Sea Level Rise",
    "Amid higher global temperatures, sea ice at record lows at poles",
    "Toddlers Involved in More Shootings Than Terrorists in 2015",
    "Chinese Doctors Confirmed African Blood Genetic Composition Resist Coronavirus After Student Cured",
    "Chinese Eating Habits to Blame for Coronavirus Outbreak, WHO Report",
    "President Trump Congratulates Wrong State for Kansas City Chief’s Super Bowl Win",
    "Presidential Candidate Joe Biden’s campaign forces Iowa public library to remove American flag",
    "County in Rural Kansas is Jailing People Over Unpaid Medical Debt",
    "Man Arrested for Smoking Marijuana While in Court for Marijuana Charge",
    "Vermont Passes Bill Banning Cell Phones For Anyone Under Age 21",
    "A Cocaine Nasal Spray Just Received FDA Approval",
    "Clorox and Lysol Found To Be Effective Against Novel 2019 Coronavirus",
    "Russia’s State TV Calls Trump Their ‘Agent’"];
    
var caption_arr = ['President Donald Trump described the relationship between the Air Force and his newest military branch, the Space Force, calling it "separate but equal."',
    "Former Cleveland congressman Dennis Kucinich met with Syrian President Bashar al-Assad this week on a trip to the war-torn land with Hawaii Democratic Rep. Tulsi Gabbard that was funded by a Cleveland organization.",
    "The United States government placed an unknown number of Central American migrant children into the custody of human traffickers after neglecting to run the most basic checks on these so-called caregivers, according to a Senate report released on Thursday.",
    "In just the past two weeks, the federal government and NIH have quietly confirmed that cannabis (marijuana) is very effective at killing cancer cells without harming healthy cells like radiation and chemotherapy.",
    "Sangulani Chikumbutso has now become the first Zimbabwean to design and make an electric powered vehicle and a hybrid helicopter, among other gadgets through his company, SAITH Technologies.",
    "Deerfield, Illinois trustees voted unanimously Monday to approve an amendment banning certain semi-automatic firearms and magazines carrying more than 10 bullets.",
    "The voting for the 2018 Nobel Peace Prize has ended, according to our source inside CERN in Norway. It took just an hour for the voting to make its way around the famous  Circle of Nobels  with a clear majority for US President Donald Trump.",
    "The raw (unadjusted) data from three Indian Ocean gauges – Aden, Karachi and Mumbai – showed that local sea level trends in the last 140 years had been very gently rising, neutral or negative (ie sea levels had fallen).",
    "For what appears to be the first time since scientists began keeping track, sea ice in the Arctic and the Antarctic are at record lows this time of year.",
    "The GOP and the Democrats alike have politicized the tragic terrorist attacks in Paris in 2015, with many governors vowing to refuse refugees entry to their states. Even though they're technically not allowed to do so.",
    "Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV). A novel coronavirus (nCoV) is a new strain that has not been previously identified in humans.",
    "In separate interviews with reporters on March 18, U.S. Sen. John Cornyn, R-Texas, said China has been the source of multiple recent contagions breaking out because of what he called a culture of eating some animals such as bats, snakes and dogs.",
    "Donald Trump was among the first to laud the Kansas City Chiefs in the wake of their 31-20 victory over the San Francisco 49ers in the Super Bowl, taking to Twitter to congratulate the newly crowned NFL champions and the ‘Great State of Kansas’.",
    "Joe Biden's wife stopped in Corning, Iowa this week to visit the public library. The library staff was told to remove the American flag as they did not want to say the Pledge of Allegiance.",
    "Tres and Heather Biggs' son Lane was diagnosed with leukemia when he was five years old. At the same time, Heather suffered seizures from Lyme disease.",
    "Spencer Boston had a message. And nothing was going to stop him from delivering it -- not even jail time.",
    "A state senator in Vermont introduced legislation this week that would make it illegal for anyone under the age of 21 to use or possess a cellphone.",
    "On January 13, the pharmaceutical company Lannett Company, Inc. announced that the United States Food and Drug Administration (FDA) approved its New Drug Application to market Numbrino, the brand-name for a cocaine hydrochloride nasal spray.",
    "According to a statement by the Clorox Company, some Clorox products, indeed, are effective 'against viruses similar' to the current strain of coronavirus.",
    "As Russian Foreign Minister Sergey Lavrov returned home from his visit with President Donald Trump in the Oval Office last week, Russian state media were gloating over the spectacle."];

var label_arr = ['F','T','T','F','F','T','F','F','T','T','F','F','T','F','T','T','F','F','T','T']

console.log(caption_arr.length);
let posts = $("#posts");
for (let i = 0; i < caption_arr.length; i++) {
    let caption = caption_arr[i];
    let headline = headline_arr[i];
    let image = img_arr[i];

    let postClone = $("#templates #post-template").clone();
    console.log(postClone);


    postClone.find("#post-caption").text(caption);
    postClone.find("#post-headline").text(headline);
    postClone.find("#post-image").attr('src', image);
    console.log(postClone.attr('style'));
    postClone.attr('style', 'display: flex');
    if (label_arr[i] == 'F'){
        postClone.find("#cred-label").attr('style', 'display: flex');
    }

    posts.append(postClone);
}
</script>