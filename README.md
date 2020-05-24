# Xervixx
# Motivation- 
Post loan disbursal relations between client and bank are very unidirectional and monotonous with the bank just collecting the dues and the customer just paying them. The bank only notifies the customer through updates whether his EMI is due. Xervixx is a platform for gamifying this process post loan disbursement.

# Description-
Xervixx was developed at a month-long hackathon called as Code Adventure, organized by RIIDL, and sponsored by Aditya Birla Capital. The firm wanted us to gamify the process of customer engagement after the disbursement of loans. For this problem statement, we as a team of two, in our second year of engineering, developed a PHP-MySQL based full-stack website which had several features like a gamified interface for EMI payment with levels and ratings which helped users to pay the EMI on time. The website revolved around the idea of having a currency/points for gamifying the experience and making users fight to earn the points. It had a social media section which let users view posts uploaded by the company and like/comment on the posts. These posts are restricted to only financial knowledge posts which helps keep the customers engaged while educating them on finance

The other part of the gamification process was to have a small game on the website. This game was a stock market dream fantasy game that we called as stock cricket. This game lets users choose among the three formats of the cricket game- ODI, Test and T20. ODI games run for an entire day, Test games run for an entire week and T20 games run for 90 minutes in real-time. The user can then form a team of 5 stocks by sorting according to the highest price, highest percentage change or company-wise alphabetically. He has to also select a captain from the team. Once, the team is selected, he has to pay pool money from the points that he has. After the stock market closes at 4:30 PM, the final results are calculated according to the portfolio change of the team in all. The captain’s percentage change is doubled. So, the leaderboard is decided according to the maximum percentage change. All the data is scraped from the NSE website using a python script and fed into the database.

There is a daily quiz section which keeps the people engaged and helps them earn some quick points. These quiz results can be used by the company for knowledge extraction purpose in order to help it target specific needs. 

Apart from the above ways, there are daily tasks which can let the customers earn points. These points can be redeemed on the website itself by purchasing coupons which lets the users get discounts on buying the next loan on the same website thus enabling cross-selling.

There is a leaderboard feature which makes the users compare their standings in the stock cricket game and/or overall points. This creates a competitive environment for the users and also benefits the company. There are sign-in/login and logout features for session management

# How to use
1. Clone the repository.
2. Create MySQL database for all the tables. 
3. Start apache and MySQL server on XAMMP.
4. Visit localhost/xervixx
