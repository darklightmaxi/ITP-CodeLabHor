import org.junit.Test;
import static org.junit.Assert.assertEquals;

public class submission {
   static void throw_if_zero(int n) {
      if (n == 0) {
        throw new IllegalArgumentException("Input darf niemals 0 sein!");
      }
   }
}
