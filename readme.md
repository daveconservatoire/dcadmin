## Dave Conservatoire Admin Tools (New Version Using Yii)

This new set of tools will be used to manage and maintain Dave Conservatoire content in the future. They make use of the Yii Framework (www.yiiframework.com), and should be a much more robust, maintainable and secure resource than the old set of tools.  

## Running your own local copy of the admin tools

If you want to run your own copy of these tools, either for your own use or to develop new features, you will need to do the following:

1.  Install the Yii Framework somewhere accessible from your local machine.  

2.  Go into the code and change the index.example.php file to index.php and then update it to show the location the yii.php file in your Yii framework directory.

3.  Change protected/config/main.example.php to protected/config/main.php and then make changes to the file to add your own database information and change the admin email if you need to.  You will also need to uncomment the section about the Gii admin tool if you need to use this to create new objects, forms etc in the system.  

4.  Change protected/components/UserIdentity.example.php to protected/components/UserIdentity.php and enter at least one username and password combination.  

Then you should be good to go!