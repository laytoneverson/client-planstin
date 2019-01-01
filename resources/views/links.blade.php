<!--
    Template:
    <tr>
        <td>Page</td>
        <td>YES NO</td>
        <td><a href=""></a></td>
        <td>Notes</td>
    </tr>
-->

<h1>Portal Pages & Links</h1>

<!-- ##### Client Registration Links ##### -->

<pre>

+--------+----------------------------------------+------------------------------------+------------------------------+-------------------------------------------------------------------+--------------+
| Domain | Method                                 | URI                                | Name                         | Action                                                            | Middleware   |
+--------+----------------------------------------+------------------------------------+------------------------------+-------------------------------------------------------------------+--------------+
|        | GET|HEAD                               | <a href="/                                  ">/                                 </a> |                              | Illuminate\Routing\ViewController                                 | web          |
|        | GET|HEAD                               | <a href="api/user                           ">api/user                          </a> |                              | Closure                                                           | api,auth:api |
|        | GET|POST|HEAD                          | <a href="broadcasting/auth                  ">broadcasting/auth                 </a> |                              | Illuminate\Broadcasting\BroadcastController@authenticate          | web          |
|        | GET|HEAD                               | <a href="login/broker                       ">login/broker                      </a> | broker.login                 | App\Http\Controllers\Broker\LoginController@login                 | web          |
|        | GET|HEAD                               | <a href="login/broker/forgot-password       ">login/broker/forgot-password      </a> | login.broker.forgot          | App\Http\Controllers\Broker\LoginController@forgotPassword        | web          |
|        | GET|HEAD                               | <a href="login/broker/recovery-code         ">login/broker/recovery-code        </a> | login.broker.recovery        | App\Http\Controllers\Broker\LoginController@recoveryCode          | web          |
|        | GET|HEAD                               | <a href="login/broker/reset-password        ">login/broker/reset-password       </a> | login.broker.reset           | App\Http\Controllers\Broker\LoginController@resetPassword         | web          |
|        | GET|HEAD                               | <a href="login/client                       ">login/client                      </a> | client.login                 | App\Http\Controllers\Client\LoginController@login                 | web          |
|        | GET|HEAD                               | <a href="login/client/forgot-password       ">login/client/forgot-password      </a> | login.client.forgot          | App\Http\Controllers\Client\LoginController@forgotPassword        | web          |
|        | GET|HEAD                               | <a href="login/client/recovery-code         ">login/client/recovery-code        </a> | login.client.recovery        | App\Http\Controllers\Client\LoginController@recoveryCode          | web          |
|        | GET|HEAD                               | <a href="login/client/reset-password        ">login/client/reset-password       </a> | login.client.reset           | App\Http\Controllers\Client\LoginController@resetPassword         | web          |
|        | GET|HEAD                               | <a href="login/member                       ">login/member                      </a> | member.login                 | App\Http\Controllers\Member\LoginController@login                 | web          |
|        | GET|HEAD                               | <a href="login/member/forgot-password       ">login/member/forgot-password      </a> | login.member.forgot          | App\Http\Controllers\Member\LoginController@forgotPassword        | web          |
|        | GET|HEAD                               | <a href="login/member/recovery-code         ">login/member/recovery-code        </a> | login.member.recovery        | App\Http\Controllers\Member\LoginController@recoveryCode          | web          |
|        | GET|HEAD                               | <a href="login/member/reset-password        ">login/member/reset-password       </a> | login.member.reset           | App\Http\Controllers\Member\LoginController@resetPassword         | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/broker                      ">portal/broker                     </a> | broker.dashboard             | App\Http\Controllers\Broker\DashboardController@home              | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/broker/clients              ">portal/broker/clients             </a> | broker.clients               | App\Http\Controllers\Broker\DashboardController@clients           | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/broker/direct-deposit       ">portal/broker/direct-deposit      </a> | broker.deposit               | App\Http\Controllers\Broker\DashboardController@directDeposit     | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/broker/direct-deposit/edit  ">portal/broker/direct-deposit/edit </a> | broker.deposit.edit          | App\Http\Controllers\Broker\DashboardController@directDepositEdit | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/broker/documents            ">portal/broker/documents           </a> | broker.documents             | App\Http\Controllers\Broker\DashboardController@documents         | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/broker/profile              ">portal/broker/profile             </a> | broker.profile               | App\Http\Controllers\Broker\DashboardController@profile           | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/broker/settings             ">portal/broker/settings            </a> | broker.settings              | App\Http\Controllers\Broker\DashboardController@settings          | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/broker/statements           ">portal/broker/statements          </a> | broker.statements            | App\Http\Controllers\Broker\DashboardController@statements        | web          |
|        | GET|HEAD                               | <a href="portal/client                      ">portal/client                     </a> |                              | App\Http\Controllers\Client\DashboardController@home              | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/member                      ">portal/member                     </a> | portal.member.dashboard      | App\Http\Controllers\Member\DashboardController@home              | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/member/agreement            ">portal/member/agreement           </a> | portal.member.agreement      | App\Http\Controllers\Member\DashboardController@agreement         | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/member/benefits             ">portal/member/benefits            </a> | portal.member.benefits       | App\Http\Controllers\Member\DashboardController@benefits          | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/member/dependents           ">portal/member/dependents          </a> | portal.member.dependents     | App\Http\Controllers\Member\DashboardController@dependents        | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/member/employer             ">portal/member/employer            </a> | portal.member.employer       | App\Http\Controllers\Member\DashboardController@employer          | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/member/settings             ">portal/member/settings            </a> | portal.member.settings       | App\Http\Controllers\Member\DashboardController@settings          | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="portal/member/submit-event         ">portal/member/submit-event        </a> | portal.member.submit-event   | App\Http\Controllers\Member\DashboardController@submitEvent       | web          |
|        | GET|HEAD                               | <a href="portal/oath_callback               ">portal/oath_callback              </a> |                              | Closure                                                           | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/broker/agreement          ">register/broker/agreement         </a> | register.broker.agreement    | App\Http\Controllers\Broker\RegisterController@agreement          | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/broker/contracting        ">register/broker/contracting       </a> | register.broker.contractings | App\Http\Controllers\Broker\RegisterController@contracting        | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/broker/signup             ">register/broker/signup            </a> | register.broker.signup       | App\Http\Controllers\Broker\RegisterController@signup             | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/client/agreement          ">register/client/agreement         </a> | register.client.agreements   | App\Http\Controllers\Client\RegisterController@agreement          | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/client/billing            ">register/client/billing           </a> | register.client.billing      | App\Http\Controllers\Client\RegisterController@billing            | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/client/employees          ">register/client/employees         </a> | register.client.employees    | App\Http\Controllers\Client\RegisterController@employees          | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/client/profile            ">register/client/profile           </a> | register.client.profile      | App\Http\Controllers\Client\RegisterController@profile            | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/client/services           ">register/client/services          </a> | register.client.services     | App\Http\Controllers\Client\RegisterController@services           | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/client/signup             ">register/client/signup            </a> | register.client.signup       | App\Http\Controllers\Client\RegisterController@signup             | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/member/agreement          ">register/member/agreement         </a> | register.member.agreement    | App\Http\Controllers\Member\RegisterController@agreement          | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/member/enrollment         ">register/member/enrollment        </a> | register.member.enrollment   | App\Http\Controllers\Member\RegisterController@enrollment         | web          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | <a href="register/member/signup             ">register/member/signup            </a> | register.member.signup       | App\Http\Controllers\Member\RegisterController@signup             | web          |
+--------+----------------------------------------+------------------------------------+------------------------------+-------------------------------------------------------------------+--------------+
</pre>
