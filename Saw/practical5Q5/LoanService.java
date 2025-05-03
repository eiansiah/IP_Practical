import java.rmi.Remote;
import java.rmi.RemoteException;

public interface LoanService extends Remote {
    double getMonthlyPayment(double loanAmount, int numberOfYears, double annualInterestRate) throws RemoteException;
    double getTotalPayment(double loanAmount, int numberOfYears, double annualInterestRate) throws RemoteException;
}
