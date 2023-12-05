ln -s submission submission.java
javac -cp /usr/share/java/hamcrest-core.jar:/usr/share/java/junit4-4.12.jar submission.java
java -cp /usr/share/java/hamcrest-core.jar:/usr/share/java/junit4-4.12.jar:. org.junit.runner.JUnitCore submission 1> error
echo $? > verdict
