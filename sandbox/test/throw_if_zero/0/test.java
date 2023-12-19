import org.junit.*;
import org.junit.rules.ExpectedException;

public class test {
  @Test(expected = IllegalArgumentException.class)
  public void test0() {
    submission.throw_if_zero(0);
  }

  @Test
  public void test1() {
    submission.throw_if_zero(1);
  }

  @Rule
  public ExpectedException exceptionRule = ExpectedException.none();

  @Test
  public void test2() {
    exceptionRule.expect(IllegalArgumentException.class);
    exceptionRule.expectMessage("Input darf niemals 0 sein!");
    submission.throw_if_zero(0);
  }
}
