Feature: Obliczenia

  Scenario: Kalkulator a + b
    Given I am on homepage
    When I follow "Kalkulator by arypulak"
    And I fill in "a" with "13"
    And I fill in "b" with "13"
    And I press "Oblicz"
    Then I should see "Wynik wynosi 26"