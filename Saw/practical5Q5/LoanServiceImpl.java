import java.rmi.server.UnicastRemoteObject;
import java.rmi.RemoteException;

public class LoanServiceImpl extends UnicastRemoteObject implements LoanService {

    public LoanServiceImpl() throws RemoteException {
        super();
    }

    @Override
    public double getMonthlyPayment(double loanAmount, int numberOfYears, double annualInterestRate) throws RemoteException {
        double monthlyInterestRate = annualInterestRate / 1200;
        double monthlyPayment = loanAmount * monthlyInterestRate / (1 - Math.pow(1 / (1 + monthlyInterestRate), numberOfYears * 12));
        return monthlyPayment;
    }

    @Override
    public double getTotalPayment(double loanAmount, int numberOfYears, double annualInterestRate) throws RemoteException {
        double monthlyPayment = getMonthlyPayment(loanAmount, numberOfYears, annualInterestRate);
        return monthlyPayment * numberOfYears * 12;
    }
}
