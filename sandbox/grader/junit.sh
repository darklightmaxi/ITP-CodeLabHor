ln -s test.in test.java
ln -s submission submission.java
javac -cp /usr/share/java/hamcrest-core.jar:/usr/share/java/junit4-4.12.jar test.java submission.java
java -cp /usr/share/java/hamcrest-core.jar:/usr/share/java/junit4-4.12.jar:. org.junit.runner.JUnitCore test 1> error
echo $? > verdict
