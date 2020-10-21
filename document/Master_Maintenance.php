<?php
$Maintenance .= '
                    <tr style="text-align: center;">
                        <td class="text-center" style="width: 70px; font-weight: bold; padding:5px; border: 1px solid #000;">' . $Number++ . '</td>
                        <td class="text-center" style="font-weight: bold; padding:5px; border: 1px solid #000;">' . $ShowMaintenance['date_maintenance'] . '</td>
                        <td class="text-center" style="font-weight: bold; padding:5px; border: 1px solid #000;">' . $ShowMaintenance['device_name'] . '</td>
                        <td style="padding:5px; border: 1px solid #000;">' . $ShowMaintenance['activity'] . '</td>
                        <td style="padding:5px; border: 1px solid #000;">' . $ShowMaintenance['action_activity'] . '</td>
                        <td style="padding:5px; border: 1px solid #000;">' . $ShowMaintenance['replacement_parts'] . '</td>
                        <td style="font-weight: bold; padding:5px;">Rp. </td>
                        <td style="text-align: right; font-weight: bold; padding:5px;">' . IndoRupiah($ShowMaintenance['cost']) . ',-</td>
                    </tr>';
