<?php include "menu.php" ?>

    <div class="container">
        <div class="section">
            <div class="title">Selenium</div>

            <div class="txt">
                Now when you are familiar with Scrapy, thus you know how to scrape anything from a static webpage it’s
                time to get into the world of dynamic pages, where data can be generated with the help of JS events
                (discussed earlier).
            </div>

            <div class="txt">
                Selenium comes into play, it is designed for doing automated actions inside of a browser with the help
                of code. You write a piece of code which can open up your browser, navigate to your favorite grocery
                website and order food for you. How cool is that, huh ?
            </div>

            <div class="txt">
                With this motivation let us get into it and install the package and drivers needed. You can find a
                simple guide here:
            </div>

            <a href="https://selenium-python.readthedocs.io/installation.html"
                class="link">https://selenium-python.readthedocs.io/installation.html</a>

            <div class="txt">
                Hopefully now you have Selenium installed on your machine, so let’s run the following code:
            </div>

            <div class="code">
                <p class="c11"><span class="c31">from</span><span class="c7">&nbsp;selenium </span><span
                        class="c31">import</span><span class="c7 c18">&nbsp;webdriver</span></p>
                <p class="c11 c49"><span class="c7 c18"></span></p>
                <p class="c11"><span class="c7 c18">browser = webdriver.Chrome()</span></p>
                <p class="c11"><span class="c7 c18">browser.maximize_window()</span></p>
                <p class="c11"><span class="c7">browser.get(</span><span
                        class="c16">&#39;https://buy.am/en/carrefour/ready-meals/&#39;</span><span class="c7">)</span>
                </p>
            </div>


            <div class="txt">
                First we import the webdriver from selenium, then we define browser variable which is a Chrome
                webdriver, so it will be using Chrome as your browsers, and then we give the url of “buy.am” to
                navigate. Seems scary, doesn’t it.
            </div>

            <div class="txt">
                Now let’s say you remember that at the end of the page there is a meal you really like and you don’t
                want every time to scroll down there, but want to automate that process.
            </div>

            <div class="code">
                <p class="c11"><span class="c31">import</span><span class="c7 c18">&nbsp;time</span></p>
                <p class="c11 c49"><span class="c7 c18"></span></p>
                <p class="c11"><span class="c7">time.sleep(</span><span class="c43">3</span><span
                        class="c7 c18">)</span></p>
                <p class="c11"><span class="c7">current_height = </span><span class="c43 c18">0</span></p>
                <p class="c11 c49"><span class="c7 c18"></span></p>
                <p class="c11"><span class="c31">while</span><span class="c7">&nbsp;current_height !=
                        browser.execute_script(</span><span class="c16">&quot;return
                        document.body.scrollHeight;&quot;</span><span class="c7 c18">):</span></p>
                <p class="c11"><span class="c7">&nbsp; &nbsp;browser.execute_script(</span><span
                        class="c16">&quot;window.scrollTo(0,document.body.scrollHeight);&quot;</span><span
                        class="c7 c18">)</span>
                </p>
                <p class="c11"><span class="c7">&nbsp; &nbsp;current_height = browser.execute_script(</span><span
                        class="c16">&quot;return document.body.scrollHeight;&quot;</span><span class="c7 c18">)</span>
                </p>
                <p class="c11"><span class="c7">&nbsp; &nbsp;time.sleep(</span><span class="c43">1</span><span
                        class="c7">)</span>
                </p>
            </div>

            <div class="txt">
                Here we import time and immediately use it. We call the sleep method which just pauses the code and
                waits for the web page to load.
            </div>

            <div class="note">
                <span class="note-keyword">Note</span>: All sleep methods called in our examples are only for the web
                page to be loaded, those numbers
                might need to be adjusted(increase/decrease) to satisfy your needs based on your connection speed.
            </div>

            <div class="txt">
                After which we define a variable called “current_height” it will hold the height from the top of the
                page till the end of it (in the beginning it will be 0, cause we are at the top). After which we are
                scrolling the page by executing JS code and updating the “current_height” value while there is a place
                to scroll.
            </div>

            <div class="txt">
                Now when you have all the elements in the webpage loaded you can scrape them with the help of Scrapy,
                just like you did before.
            </div>

            <div class="txt">
                But, your favorite meal might not be at the end, other somewhere in the middle, so what should we do ?
                We can find the item which has a specific name in the page, like this:
            </div>


            <div class="code">
                <p class="c11"><span class="c31">from</span><span class="c7">&nbsp;selenium.webdriver.common.by
                    </span><span class="c31">import</span><span class="c7 c18">&nbsp;By</span></p>
                <p class="c11 c49"><span class="c7 c18"></span></p>
                <p class="c11"><span class="c7">add_to_bucket = browser.find_element(By.XPATH, </span><span
                        class="c16">&#39;//a[contains(text(), &quot;Cabbage
                        Salad&quot;)]/../div[@class=&quot;product-actions
                        &quot;]//button&#39;</span><span class="c7 c18">)</span></p>
                <p class="c11 c49"><span class="c7 c18"></span></p>
                <p class="c11"><span class="c7 c18">add_to_bucket.click()</span></p>
            </div>


            <div class="txt">
                Here we import By module from selenium and then use it inside of find_element function to specify that
                we want to find an element by XPath (you can select with css and many more). The element that we want
                should be an “a” tag which text should contain “Cabbage Salad” text, and we are interested in a button
                which is in a “div” with class “product-actions” which is sibling to the “a” tag. In the end we click on
                it. You should notice the bucket size to be increased by one.
                So you can do many more by firing a lot of different actions/events. Play around a little bit and find
                out if you can take this process up to payment form filling.
            </div>

            <div class="txt">
                I guess you can see that the things we can do with the help of Selenium are innumerable. You can use
                Selenium for scraping as it was expected. Let’s scrape prices of items we saw earlier, for that try this
                snippet:
            </div>

            <div class="code">
                <p class="c11"><span class="c7">names = browser.find_elements_by_xpath(</span><span
                        class="c16">&#39;//a[@class=&quot;product--title&quot;]&#39;</span><span class="c7 c18">)</span>
                </p>
                <p class="c11"><span class="c7">prices = browser.find_elements_by_xpath(</span><span
                        class="c16">&#39;//span[@class=&quot;price--default is--nowrap&quot;]&#39;</span><span
                        class="c7 c18">)</span></p>
                <p class="c11 c49"><span class="c7 c18"></span></p>
                <p class="c11"><span class="c7">name_price_dict = </span><span class="c57">dict</span><span
                        class="c7 c18">()</span>
                </p>
                <p class="c11"><span class="c31">for</span><span class="c7">&nbsp;name, price </span><span
                        class="c31">in</span><span class="c7">&nbsp;</span><span class="c52">zip</span><span
                        class="c7 c18">(names,
                        prices):</span></p>
                <p class="c11"><span class="c7 c18">&nbsp; &nbsp;name_price_dict[name.text] = price.text</span></p>
            </div>


            <div class="txt">
                Here we are using find_elements_by_xpath method, the name says why. This gets the XPath for matching all
                desired elements after and then returns a list of elements matching that criterion, which we iterate
                through and make a simple dict with key-name and value-price pairs.
            </div>





        </div>
    </div>

    <div class="container">
        <div class="resources">
            <div class="resources-title">Resources</div>
            <div class="resources-list">
                <a target="_blank" href="https://selenium-python.readthedocs.io/"
                    class="link">https://selenium-python.readthedocs.io/</a>
                <a target="_blank" href="https://selenium-python.readthedocs.io/getting-started.html"
                    class="link">https://selenium-python.readthedocs.io/getting-started.html</a>
            </div>
        </div>
    </div>



<?php include "footer.php" ?>